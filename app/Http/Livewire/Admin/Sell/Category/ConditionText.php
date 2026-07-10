<?php

namespace App\Http\Livewire\Admin\Sell\Category;

use App\Models\Category;
use App\Models\CategoryText;
use Livewire\Component;

class ConditionText extends Component
{

    public $category;
    public $selectedCondition = 'Excellent';
    public $content;


    protected $listeners = ['categoryId'];
    public function categoryId(Category $category)
    {
        $this->category = $category;
        $category_text = CategoryText::where('category_id', $this->category->id)->first();
        $excellent_condition = $category_text ?  json_decode($category_text->condition_text)->Excellent : '';
        $this->content = $excellent_condition;
        $this->emit('editorConditionChanged');
    }

    public function selectGrade($condition)
    {
        $this->selectedCondition = $condition;
        $category_text = CategoryText::where('category_id', $this->category->id)->first();
        switch ($condition) {
            case 'Excellent':
                $condition_text = $category_text ?  json_decode($category_text->condition_text)->Excellent : '';
                break;
            case 'Good':
                $condition_text = $category_text ?  json_decode($category_text->condition_text)->Good : '';
                break;
            case 'Fair':
                $condition_text = $category_text ?  json_decode($category_text->condition_text)->Fair : '';
                break;
            case 'Faulty':
                $condition_text = $category_text ?  json_decode($category_text->condition_text)->Faulty : '';
                break;
            case 'Poor':
                $condition_text = $category_text ?  json_decode($category_text->condition_text)->Poor : '';
                break;

            default:
                # code...
                break;
        }

        $this->content = $condition_text  ?? '';
        $this->emit('editorConditionChanged');
    }

    public function save()
    {
        $category_text = CategoryText::where('category_id', $this->category->id)->first();
        if ($category_text) {
            $content = [
                'Excellent' => $this->selectedCondition == 'Excellent' ?  $this->content :  json_decode($category_text->condition_text)->Excellent,
                'Good' => $this->selectedCondition == 'Good' ? $this->content :  json_decode($category_text->condition_text)->Good,
                'Fair' => $this->selectedCondition == 'Fair' ? $this->content :  json_decode($category_text->condition_text)->Fair,
                'Faulty' => $this->selectedCondition == 'Faulty' ? $this->content :  json_decode($category_text->condition_text)->Faulty,
                'Poor' => $this->selectedCondition == 'Poor' ? $this->content :  json_decode($category_text->condition_text)->Poor,
            ];
            $category_text->condition_text = json_encode($content);
            $category_text->save();
        } else {
            $category_text = new CategoryText();
            $content = [
                'Excellent' => $this->selectedCondition == 'Excellent' ?  $this->content :  null,
                'Good' => $this->selectedCondition == 'Good' ? $this->content :  null,
                'Fair' => $this->selectedCondition == 'Fair' ? $this->content :  null,
                'Faulty' => $this->selectedCondition == 'Faulty' ? $this->content :  null,
                'Poor' => $this->selectedCondition == 'Poor' ? $this->content :  null,
            ];
            $category_text->condition_text = json_encode($content);
            $category_text->category_id = $this->category->id;
            $category_text->save();
        }
    }

    public function render()
    {
        return view('livewire.admin.sell.category.condition-text');
    }
}
