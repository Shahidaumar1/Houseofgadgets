<?php

namespace App\Http\Livewire\Admin\Unlocking\Category;

use App\Models\Category;
use App\Models\CategoryText;
use Livewire\Component;

class GradeText extends Component
{
    public $category;
    public $selectedGrade = 'A';
    public $content;

    protected $listeners = ['categoryId'];
    public function categoryId(Category $category)
    {
        $this->category = $category;
        $category_text = CategoryText::where('category_id', $this->category->id)->first();
        $grade_A = $category_text ?  json_decode($category_text->grade_text)->A : null;
        $this->content = $grade_A;
        $this->emit('editorGradeChanged');
    }

    public function selectGrade($grade)
    {
        $this->selectedGrade = $grade;
        $category_text = CategoryText::where('category_id', $this->category->id)->first();
        switch ($grade) {
            case 'A':
                $grade_text = $category_text ?  json_decode($category_text->grade_text)->A : '';
                break;
            case 'B':
                $grade_text = $category_text ?  json_decode($category_text->grade_text)->B : '';
                break;
            case 'C':
                $grade_text = $category_text ?  json_decode($category_text->grade_text)->C : '';
                break;

            default:
                # code...
                break;
        }

        $this->content = $grade_text == null  ? '' : $grade_text;
        $this->emit('editorGradeChanged');
    }

    public function save()
    {
        $category_text = CategoryText::where('category_id', $this->category->id)->first();
        if ($category_text) {
            $content = [
                'A' => $this->selectedGrade == 'A' ?  $this->content :  json_decode($category_text->grade_text)->A,
                'B' => $this->selectedGrade == 'B' ? $this->content :  json_decode($category_text->grade_text)->B,
                'C' => $this->selectedGrade == 'C' ? $this->content :  json_decode($category_text->grade_text)->C
            ];
            $category_text->grade_text = json_encode($content);
            $category_text->save();
        } else {
            $category_text = new CategoryText();
            $content = [
                'A' => $this->selectedGrade == 'A' ?  $this->content :  null,
                'B' => $this->selectedGrade == 'B' ? $this->content :  null,
                'C' => $this->selectedGrade == 'C' ? $this->content :  null
            ];
            $category_text->grade_text = json_encode($content);
            $category_text->category_id = $this->category->id;
            $category_text->save();
        }
    }

    public function render()
    {
        return view('livewire.admin.unlocking.category.grade-text');
    }
}
