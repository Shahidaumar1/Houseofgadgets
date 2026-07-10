<?php

namespace App\Http\Livewire\Admin\Settings\Branches;

use Livewire\Component;
use App\Models\Branch;

class Index extends Component
{
    public $data = [];
    public $branches;
    public $selectBranch;
    public $confirmingDelete = false;
    public $branchToDelete;

    public $deleteId;
    public $search = '';
    public function mount()
    {
        $this->branches = Branch::all();
        $this->loadNextComponentData();
    }
    public function updatedSearch()
    {
        // This method will be triggered when the $search property is updated
        $this->emit('searchChanged', $this->search);
        
    }
    
    

    
    
 public function deleteBranch($id)
    {
        $branch = Branch::findOrFail($id);
        $branch->delete();
        session()->flash('message', 'Branch deleted successfully.');
    }    
    
    
    

    // public function confirmDelete($branchId)
    // {
    //     $this->confirmingDelete = true;
    //     $this->branchToDelete = $branchId;
    // }
    // public function delete()
    // {
    //     Branch::findOrFail($this->branchToDelete)->delete();
    //     session()->flash('message', 'Branch deleted successfully!');

    //     $this->branches = Branch::all();
    //     $this->confirmingDelete = false;
    // }
    public function selectBranch(Branch $branch)
    {
        $this->emit('catSelected', $branch->id);
        $this->selectBranch = $branch;
        $this->emit('showM', 'edit-sell-cat');
    }
    public function loadNextComponentData()
    {

        $this->data = [
            'title' => 'Payment',
            'route' => 'payment-methods-settings',
            'button_text' => 'Back'
        ];
    }
    public function render()
    {
        return view('livewire.admin.settings.branches.index')->layout('layouts.admin');
    }
}
