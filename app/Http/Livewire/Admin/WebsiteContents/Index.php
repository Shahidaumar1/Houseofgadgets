<?php

namespace App\Http\Livewire\Admin\WebsiteContents;

use Illuminate\Support\Facades\Redirect;
use App\Models\WebsiteContent;
use Livewire\Component;
use App\Models\UserInput;
use Illuminate\Support\Facades\Session;


class Index extends Component
{
    public $websiteContents;
    public $contentId;
    public $editableTextId;
    public $editableTextKey;
    public $text;
    public $inputText = '';
    public $showInput = false;

    public $inputText2 = ''; // New property for the second input text
    public $showInput2 = false; // New property for controlling the visibility of the second input box
    public $page = "homePage";

    protected $listeners = ['refreshTable', 'ContentUpdate'];
    public function mount()
    {
        // $this->contentId = $contentId;
        $this->websiteContents = WebsiteContent::all();
        // $this->inputText = UserInput::latest()->value('text');
        $this->inputText = Session::get('inputText', ''); // Retrieve input text from session
        $this->inputText2 = Session::get('inputText2', ''); // Retrieve input text2 from session

    }


    public function loadInputText2()
    {
        $userInput = UserInput::latest()->first();
        $this->inputText2 = $userInput ? $userInput->text : '';
    }

    public function displayText2()
    {
        UserInput::create(['text' => $this->inputText2]);
        $this->showInput2 = false;
        Session::put('inputText2', $this->inputText2); // Store inputText2 in session
    }


    public function editnew2()
    {
        $this->showInput2 = true;
    }



    public function toggleSection($page)
    {
        $this->page = $page;
    }



    public function loadInputText()
    {
        $userInput = UserInput::latest()->first();
        $this->inputText = $userInput ? $userInput->text : '';
    }



    public function displayText()
    {
        // Save the input text to the database
        UserInput::create(['text' => $this->inputText]);
        $this->showInput = false;
        Session::put('inputText', $this->inputText); // Emit event with the input text

    }

    public function editnew()
    {
        $this->showInput = true;
    }


    public function refreshTable()
    {
        $this->websiteContents = WebsiteContent::all();

        // return Redirect::to('/website-contents');
    }

    public function ContentUpdate($contentId)
    {
        $this->text = WebsiteContent::where('id', $contentId)->first()->text;
    }
    public function toggleEditable($contentId)
    {
        $this->editableTextId = $contentId;
        $this->contentId = $contentId;
        $WebsiteContent = WebsiteContent::where('id', $contentId)->first();
        $this->text = $WebsiteContent->text;
    }
    public function toggleEditableByKey($contentKey)
    {
        $this->editableTextKey = $contentKey;
        $WebsiteContent = WebsiteContent::where('key', $contentKey)->first();
        $this->text = $WebsiteContent->text;
        $this->contentId = $WebsiteContent->id;
    }

    public function updateContentText($contentId)
    {
        $WebsiteContent = WebsiteContent::where('id', $contentId)->first();
        $WebsiteContent->text = $this->text;
        $WebsiteContent->save();
        $this->editableTextId = null;
        $this->editableTextKey = null;
        $this->emit('ContentUpdate', $WebsiteContent);
    }
    public function render()
    {
        return view('livewire.admin.website-contents.index')->layout('layouts.admin');
    }

    public function edit($id = null)
    {

        $this->emit('showM', 'add-web-content');
        $this->emit('contentId', $id);
    }

    public function delete($id)
    {
        // Implement the logic for deleting a website content
    }
}
