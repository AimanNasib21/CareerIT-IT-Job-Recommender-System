<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ResumeSkillTool extends Component
{
    public $skills, $type, $technology, $percentage, $skill_id;
    public $updateMode = false;

    public function render()
    {
        $this->skills = auth()->user()->resumeSkills;
        return view('livewire.resume-skill-tool');
    }

    private function resetInputFields(){
        $this->type = '';
        $this->technology = '';
        $this->percentage = '';
    }

    public function store()
    {
        $this->validate([
            'type' => 'required',
            'technology' => 'required',
            'percentage' => 'required|numeric|max:100|min:0',
        ]);

        $user = Auth::user();

        $user->resumeSkills()->create([
            'type' => $this->type,
            'technology' => $this->technology,
            'percentage' => $this->percentage,
        ]);

        $this->resetInputFields();

        session()->flash('success', 'Skill added successfully.');
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function delete($id)
    {
        $user = Auth::user();
        $skill = $user->resumeSkills()->where('id', $id)->first();
        $skill->delete();
        session()->flash('success', 'Work Experience deleted successfully.');
    }
}
