<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ResumeEdu extends Component
{
    public $edus, $certification, $institution, $start_year, $end_year, $edu_id;
    public $updateMode = false;

    public function render()
    {
        $this->edus = auth()->user()->resumeEdus;
        return view('livewire.resume-edu');
    }

    private function resetInputFields(){
        $this->certification = '';
        $this->institution = '';
        $this->start_year = '';
        $this->end_year = '';
    }

    public function store()
    {
        $this->validate([
            'certification' => 'required',
            'institution' => 'required',
            'start_year' => 'required',
            'end_year' => 'required',
        ]);

        $user = Auth::user();

        $user->resumeEdus()->create([
            'certification' => $this->certification,
            'institution' => $this->institution,
            'start_year' => $this->start_year,
            'end_year' => $this->end_year,
        ]);

        $this->resetInputFields();

        session()->flash('success', 'Education added successfully.');
    }

    public function edit($id)
    {
        $user = Auth::user();
        $work = $user->resumeEdus()->where('id', $id)->first();
        $this->edu_id = $id;
        $this->certification = $work->certification;
        $this->institution = $work->institution;
        $this->start_year = $work->start_year;
        $this->end_year = $work->end_year;

        $this->updateMode = true;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update($id)
    {
        $this->validate([
            'certification' => 'required',
            'institution' => 'required',
            'start_year' => 'required',
            'end_year' => 'required',
        ]);

        $user = Auth::user();
        $work = $user->resumeEdus()->where('id', $id)->first();
        $work->certification = $this->certification;
        $work->institution = $this->institution;
        $work->start_year = $this->start_year;
        $work->end_year = $this->end_year;
        $work->save();

        $this->updateMode = false;
        $this->resetInputFields();

        session()->flash('success', 'Education updated successfully.');
    }

    public function delete($id)
    {
        $user = Auth::user();
        $work = $user->resumeEdus()->where('id', $id)->first();
        $work->delete();
        session()->flash('success', 'Education deleted successfully.');
    }
}
