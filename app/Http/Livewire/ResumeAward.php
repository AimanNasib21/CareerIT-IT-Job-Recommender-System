<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ResumeAward extends Component
{
    public $awards, $title, $description, $award_id;
    public $updateMode = false;

    public function render()
    {
        $this->awards = auth()->user()->resumeAwards;
        return view('livewire.resume-award');
    }

    private function resetInputFields(){
        $this->title = '';
        $this->description = '';
    }

    public function store()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $user = Auth::user();

        $user->resumeAwards()->create([
            'title' => $this->title,
            'description' => $this->description,
        ]);

        $this->resetInputFields();

        session()->flash('success', 'Award added successfully.');
    }

    public function edit($id)
    {
        $user = Auth::user();
        $award = $user->resumeAwards()->where('id', $id)->first();
        $this->award_id = $id;
        $this->title = $award->title;
        $this->description = $award->description;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $user = Auth::user();
        $award = $user->resumeAwards()->where('id', $this->award_id)->first();
        $award->title = $this->title;
        $award->description = $this->description;
        $award->save();

        $this->updateMode = false;

        session()->flash('success', 'Award updated successfully.');
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function delete($id)
    {
        $user = Auth::user();
        $skill = $user->resumeAwards()->where('id', $id)->first();
        $skill->delete();
        session()->flash('success', 'Award deleted successfully.');
    }
}
