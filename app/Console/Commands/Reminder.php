<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\GrandPrix;
use App\User;
use Illuminate\Support\Facades\Mail;

class Reminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check if we need to send a mail';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */

    private function send($template, $title, $content, $to) {

        Mail::send($template, ['title' => $title, 'content' => $content, 'to' => $to], function ($message) use ($to)
        {
            $message->from('me@gmail.com', 'Christian Nwamba');
            $message->to($to);
        });

    }

    public function handle()
    {

        $today = Carbon::now('Europe/Paris');
        $gp = GrandPrix::where('date', '>', $today)->orderBy('date')->first();
        $date_gp = new Carbon($gp->date);
        $m_before = $date_gp->subDays(3);
        $th_before = $date_gp->subDays(3);
        if ($m_before->isSameDay($today)) {
            $users = User::all();
            foreach ($users as $user) {
                $this->send('emails.send', "reminder", "proute2", $user->email);
            }
            return response()->json(['message' => 'Request completed']);
        }
        else if ($th_before->isSameDay($today))
            echo "Jeudi";
        else
            echo "Nothing";
    }
}
