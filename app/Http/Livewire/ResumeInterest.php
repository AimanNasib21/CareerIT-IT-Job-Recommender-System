<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ResumeInterest extends Component
{
    public $interests, $title;

    public function render()
    {
        $this->interests = auth()->user()->resumeInterests;
        return view('livewire.resume-interest');
    }

    private function resetInputFields(){
        $this->title = '';
    }

    public function store()
    {
        $this->validate([
            'title' => 'required',
        ]);

        $user = Auth::user();

        $user->resumeInterests()->create([
            'title' => $this->title,
        ]);

        $this->resetInputFields();

        session()->flash('success', 'Interest added successfully.');
    }

    public function delete($id)
    {
        $user = Auth::user();
        $skill = $user->resumeInterests()->where('id', $id)->first();
        $skill->delete();
        session()->flash('success', 'Interest deleted successfully.');
    }
}
