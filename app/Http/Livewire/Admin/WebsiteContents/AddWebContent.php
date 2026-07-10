<?php

namespace App\Http\Livewire\Admin\WebsiteContents;

use App\Models\WebsiteContent;
use Livewire\Component;
use PhpOffice\PhpSpreadsheet\Calculation\TextData\CaseConvert;

class AddWebContent extends Component
{
    public $key;
    public $content;
    public $description;
    public $editing = false;
    public $contentId; // To store the ID of the content being edited


    protected $listeners = ['contentId' => 'changeId', 'contentKey' => 'ChangeByKey'];
    public function rules()
    {
        return [
            'key' => 'required|unique:website_contents,key,' . $this->contentId,
            'content' => 'nullable',
            'description' => 'nullable',
        ];
    }



    public function changeId($contentId)
    {
        if ($contentId) {
            $this->editing = true;
            $content = WebsiteContent::findOrFail($contentId);
            $this->key = $content->key;
            $this->content = $content->text;
            $this->description = $content->description;
            $this->contentId = $content->id;
        } else {
            $this->editing = false;
            $this->reset(['key', 'content', 'description']);
        }
        $this->emit('AddContent');
    }
    public function ChangeByKey($contentKey)
    {
        $this->editing = true;
        $content = WebsiteContent::where('key', $contentKey)->first();
        $this->key = $content->key;
        $this->content = $content->text;
        $this->description = $content->description;
        $this->contentId = $content->id;

        $this->emit('AddContent');
    }
    public function render()
    {
        return view('livewire.admin.website-contents.add-web-content');
    }
    protected function sanitizeKey($value)
    {
        // Trim and remove spaces from the key
        return str_replace(' ', '_', trim(strtolower($value)));
    }

    public function save()
    {
        $this->validate();
        // Trim and remove spaces from the key
        $this->key = $this->sanitizeKey($this->key);
        if ($this->editing) {
            // Update existing content
            $content = WebsiteContent::findOrFail($this->contentId);
            $content->update([
                'key' => $this->key,
                'text' => $this->content,
                'description' => $this->description,
            ]);
        } else {
            WebsiteContent::create([
                'key' => $this->key,
                'text' => $this->content,
                'description' => $this->description,
            ]);
        }

        $this->editing = false;
        // Reset input fields after saving
        $this->reset(['key', 'content', 'description']);

        // Emit an event to refresh the parent component (index)
        $this->emit('contentAdded');
        // $this->emit('AddContent',$this->content);

        // Close the modal
        $this->emit('closeM', 'add-web-content');
    }
}
