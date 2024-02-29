<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ResumeWork extends Component
{
    public $works, $title, $company, $start_year, $end_year, $description, $achievements, $technologies, $work_id;
    public $updateMode = false;

    public $inputs = [];
    public $i = 1;


    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs ,$i);
    }

    public function remove($i)
    {
        unset($this->inputs[$i]);
    }

    public function render()
    {
        $this->works = auth()->user()->resumeWorks;
        return view('livewire.resume-work');
    }

    private function resetInputFields(){
        $this->title = '';
        $this->company = '';
        $this->start_year = '';
        $this->end_year = '';
        $this->description = '';
        $this->achievements = '';
        $this->technologies = '';
    }

    public function store()
    {
        $this->validate([
            'title' => 'required',
            'company' => 'required',
            'start_year' => 'required',
            'end_year' => 'required',
            'description' => 'required',
            'achievements' => 'required',
            'technologies.*' => 'required',
        ]);

        $user = Auth::user();

        // Get only the values
        $valuesArray = array_values($this->technologies);

        // Convert array to JSON
        $jsonArray = json_encode($valuesArray);

        $user->resumeWorks()->create([
            'title' => $this->title,
            'company' => $this->company,
            'start_year' => $this->start_year,
            'end_year' => $this->end_year,
            'description' => $this->description,
            'achievements' => $this->achievements,
            'technologies' => $jsonArray
        ]);

        $this->resetInputFields();

        session()->flash('success', 'Work Experience added successfully.');
    }

    public function edit($id)
    {
        $user = Auth::user();
        $work = $user->resumeWorks()->where('id', $id)->first();
        $this->title = $work->title;
        $this->company = $work->company;
        $this->start_year = $work->start_year;
        $this->end_year = $work->end_year;
        $this->description = $work->description;
        $this->achievements = $work->achievements;
        $this->technologies = $work->technologies;
        $this->work_id = $id;

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
            'title' => 'required',
            'company' => 'required',
            'start_year' => 'required',
            'end_year' => 'required',
            'description' => 'required',
            'achievements' => 'required',
            'technologies' => 'required',
        ]);

        $user = Auth::user();
        $work = $user->resumeWorks()->where('id', $id)->first();
        $work->title = $this->title;
        $work->company = $this->company;
        $work->start_year = $this->start_year;
        $work->end_year = $this->end_year;
        $work->description = $this->description;
        $work->achievements = $this->achievements;
        $work->technologies = $this->technologies;
        $work->save();

        $this->updateMode = false;
        $this->resetInputFields();

        session()->flash('success', 'Work Experience updated successfully.');
    }

    public function delete($id)
    {
        $user = Auth::user();
        $user->resumeWorks()->where('id', $id)->delete();
        session()->flash('success', 'Work Experience deleted successfully.');
    }
}
