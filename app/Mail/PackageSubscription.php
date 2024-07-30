<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PackageSubscription extends Mailable
{
    use Queueable, SerializesModels;


    public $packageName;
    public $packageNo_of_posts;
    public $packagePrice;
    public $tax;
    public $packagePrice_show;
    public $packageTime_interval;
    public $userName;
    public $address;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($packageName, $packageNo_of_posts, $packagePrice,$tax,$packagePrice_show,$packageTime_interval, $userName,$address)
    {
        $this->packageName = $packageName;
        $this->packageNo_of_posts = $packageNo_of_posts;
        $this->packagePrice = $packagePrice;
        $this->tax = $tax;
        $this->packagePrice_show = $packagePrice_show;
        $this->packageTime_interval = $packageTime_interval;
        $this->userName = $userName;
        $this->$address = $address;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = 'Package subscribed';
        return $this->view('emails.subscription')->subject($subject);
    }
}
