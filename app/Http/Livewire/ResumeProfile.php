<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class ResumeProfile extends Component
{
    public $name, $email, $job_title, $summary, $phone, $linkedin, $github, $codepen, $website;

    public function mount()
    {
        $user = User::find(auth()->user()->id);
        $this->name = $user->name;
        $this->email = $user->email;
        if ($user->resumeUser) {
            $this->job_title = $user->resumeUser->job_title;
            $this->summary = $user->resumeUser->summary;
            $this->phone = $user->resumeUser->phone;
            $this->linkedin = $user->resumeUser->linkedin;
            $this->github = $user->resumeUser->github;
            $this->codepen = $user->resumeUser->codepen;
            $this->website = $user->resumeUser->website;
        }
    }

    public function render()
    {
        return view('livewire.resume-profile');
    }

    public function saveOrUpdate()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'job_title' => 'required',
            'summary' => 'required',
            'phone' => 'required',
            'linkedin' => 'required|nullable',
            'github' => 'required|nullable',
            'codepen' => 'required|nullable',
            'website' => 'required|nullable',
        ]);

        $user = User::find(auth()->user()->id);
        $user->name = $this->name;
        $user->email = $this->email;
        $user->save();

        if ($user->resumeUser) {
            $user->resumeUser->job_title = $this->job_title;
            $user->resumeUser->summary = $this->summary;
            $user->resumeUser->phone = $this->phone;
            $user->resumeUser->linkedin = $this->linkedin;
            $user->resumeUser->github = $this->github;
            $user->resumeUser->codepen = $this->codepen;
            $user->resumeUser->website = $this->website;
            $user->resumeUser->save();
        }else{
            $user->resumeUser()->create([
                'job_title' => $this->job_title,
                'summary' => $this->summary,
                'phone' => $this->phone,
                'linkedin' => $this->linkedin,
                'github' => $this->github,
                'codepen' => $this->codepen,
                'website' => $this->website,
            ]);
        }

        session()->flash('success', 'Profile updated successfully');
    }
}
