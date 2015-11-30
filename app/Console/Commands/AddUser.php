<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use Carbon\Carbon;
use Hash;

class AddUser extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'user:add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds a new user.';
    
    protected $signature = 'user:add {email} {password}';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {

		$user = new User;
		$user->email = $this->argument('email');
		$user->password = Hash::make($this->argument('password'));
		$user->save();
		
		dd($user->toArray());

    }
    


}