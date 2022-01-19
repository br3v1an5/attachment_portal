<?php

namespace App\Mail;

use App\Models\Student;
use App\Models\Supervisor;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SupervisorAllocated extends Mailable
{
    use Queueable, SerializesModels;
    public $student;
    public $supervisor;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Supervisor $supervisor, Student $student)
    {
        $this->supervisor = $supervisor;
        $this->student = $student;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.student.supervisor_allocated');
    }
}
