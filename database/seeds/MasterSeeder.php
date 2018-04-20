<?php

use Illuminate\Database\Seeder;
use App\Article;
use App\Email;
use App\SocialLink;
use App\WebConfig;
use App\Images;
use App\Category;

class MasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // sample admin
        App\User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('secret'),
            'full_admin' => '1'
        ]);

        $email1 = Email::create(['name' => 'Mariasa Gusti', 'email' => 'gstmariasa@gmail.com', 'receipt' => 1]);

        $tt = SocialLink::create([
            'platform' => 'twitter',
            'link' => 'https://twitter.com',
            'published' => '1'
        ]);

        $fb = SocialLink::create([
            'platform' => 'facebook',
            'link' => 'https://facebook.com',
            'published' => '1'
        ]);

        $ig = SocialLink::create([
            'platform' => 'instagram',
            'link' => 'https://instagram.com',
            'published' => '1'
        ]);

        $arteqid = uniqid('ART', true);
        $homeid = Article::create([
            'title' => 'Halaman Utama',
            'thumb_image' => '',
            'conten' => 'Halaman Utama',
            'meta_title' => '',
            'meta_keyword' => '',
            'meta_description' => '',
            'position' => 'menu-utama',
            'published' => '1',
            'link' => '/',
            'more_config' => '1',
            'admin_config' => '1',
            'lang' => 'id',
            'equal_id' => $arteqid
        ]);
        $homeen = Article::create([
            'title' => 'Home',
            'thumb_image' => '',
            'conten' => 'Home',
            'meta_title' => '',
            'meta_keyword' => '',
            'meta_description' => '',
            'position' => 'menu-utama',
            'published' => '1',
            'link' => '/',
            'more_config' => '1',
            'admin_config' => '1',
            'lang' => 'en',
            'equal_id' => $arteqid
        ]);

        $imgeqid = uniqid('IMG', true);
        $homeslider1id = Images::create([
            'name' => 'Home Slider 1',
            'image' => 'text-rotator.jpg',
            'type' => 'home-slider',
            'slider_conten' => '<h1>Best Online Learning</h1>
                            <p>Your chance to be a trending expert in IT industries and make a successful <br/> career after completion of our courses.</p>
                            <a href="#." class="border_radius btn_common white_border">our services</a>
                            <a href="#." class="border_radius btn_common red">Get a quote</a>',
            'lang' => 'id',
            'equal_id' => $imgeqid
        ]);
        $homeslider1en = Images::create([
            'name' => 'Home Slider 1',
            'image' => 'text-rotator.jpg',
            'type' => 'home-slider',
            'slider_conten' => '<h1>Best Online Learning</h1>
                            <p>Your chance to be a trending expert in IT industries and make a successful <br/> career after completion of our courses.</p>
                            <a href="#." class="border_radius btn_common white_border">our services</a>
                            <a href="#." class="border_radius btn_common red">Get a quote</a>',
            'lang' => 'en',
            'equal_id' => $imgeqid
        ]);

        $imgeqid = uniqid('IMG', true);
        $homeslider2id = Images::create([
            'name' => 'Home Slider 2',
            'image' => 'text-rotator.jpg',
            'type' => 'home-slider',
            'slider_conten' => '',
            'lang' => 'id',
            'equal_id' => $imgeqid
        ]);
        $homeslider2en = Images::create([
            'name' => 'Home Slider 2',
            'image' => 'text-rotator.jpg',
            'type' => 'home-slider',
            'slider_conten' => '',
            'lang' => 'en',
            'equal_id' => $imgeqid
        ]);

        $arteqid = uniqid('ART', true);
        $aboutid = Article::create([
            'title' => 'Tentang Kami',
            'thumb_image' => 'about-us.jpg',
            'short_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa.',
            'conten' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa. Aliquam ultricies tincidunt felis sed consequat. Praesent vitae eros sit amet lorem volutpat volutpat. Nunc quis ipsum vulputate mauris commodo auctor a id sem. Morbi suscipit libero augue, sed pharetra turpis posuere sed. Donec elementum tincidunt augue, sed tincidunt nulla fringilla sit amet. Donec vitae aliquet felis, quis cursus ligula. Sed euismod tincidunt tempus. Morbi eget lectus at ipsum pretium pretium. Duis lobortis, dolor id iaculis interdum, leo leo eleifend nisl, tempus semper erat nibh non nisi. Sed elit mi, fermentum nec commodo ac, viverra ut ante.',
            'meta_title' => '',
            'meta_keyword' => '',
            'meta_description' => '',
            'position' => 'menu-utama',
            'published' => '1',
            'link' => 'tentang-kami',
            'more_config' => '0',
            'admin_config' => '1',
            'lang' => 'id',
            'equal_id' => $arteqid
        ]);
        $abouten = Article::create([
            'title' => 'About Us',
            'thumb_image' => 'about-us.jpg',
            'short_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa.',
            'conten' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa. Aliquam ultricies tincidunt felis sed consequat. Praesent vitae eros sit amet lorem volutpat volutpat. Nunc quis ipsum vulputate mauris commodo auctor a id sem. Morbi suscipit libero augue, sed pharetra turpis posuere sed. Donec elementum tincidunt augue, sed tincidunt nulla fringilla sit amet. Donec vitae aliquet felis, quis cursus ligula. Sed euismod tincidunt tempus. Morbi eget lectus at ipsum pretium pretium. Duis lobortis, dolor id iaculis interdum, leo leo eleifend nisl, tempus semper erat nibh non nisi. Sed elit mi, fermentum nec commodo ac, viverra ut ante.',
            'meta_title' => '',
            'meta_keyword' => '',
            'meta_description' => '',
            'position' => 'menu-utama',
            'published' => '1',
            'link' => 'about-us',
            'more_config' => '0',
            'admin_config' => '1',
            'lang' => 'en',
            'equal_id' => $arteqid
        ]);

        $arteqid = uniqid('ART', true);
        $pendaftaranid = Article::create([
            'title' => 'Pendaftaran',
            'thumb_image' => '',
            'conten' => 'Pendaftaran',
            'meta_title' => '',
            'meta_keyword' => '',
            'meta_description' => '',
            'position' => 'menu-utama',
            'published' => '1',
            'link' => 'pendaftaran',
            'more_config' => '0',
            'admin_config' => '1',
            'lang' => 'id',
            'equal_id' => $arteqid
        ]);
        $pendaftaranen = Article::create([
            'title' => 'Registration',
            'thumb_image' => '',
            'conten' => 'Registration',
            'meta_title' => '',
            'meta_keyword' => '',
            'meta_description' => '',
            'position' => 'menu-utama',
            'published' => '1',
            'link' => 'registration',
            'more_config' => '0',
            'admin_config' => '1',
            'lang' => 'en',
            'equal_id' => $arteqid
        ]);

        $arteqid = uniqid('ART', true);
        $programid = Article::create([
            'title' => 'Program',
            'thumb_image' => '',
            'conten' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
            'meta_title' => '',
            'meta_keyword' => '',
            'meta_description' => '',
            'position' => 'menu-utama',
            'published' => '1',
            'link' => 'program',
            'more_config' => '1',
            'admin_config' => '1',
            'lang' => 'id',
            'equal_id' => $arteqid
        ]);
        $programen = Article::create([
            'title' => 'Program',
            'thumb_image' => '',
            'conten' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
            'meta_title' => '',
            'meta_keyword' => '',
            'meta_description' => '',
            'position' => 'menu-utama',
            'published' => '1',
            'link' => 'program',
            'more_config' => '1',
            'admin_config' => '1',
            'lang' => 'en',
            'equal_id' => $arteqid
        ]);

        $arteqid = uniqid('ART', true);
        $program1id = Article::create([
            'title' => 'Room Division',
            'thumb_image' => '',
            'short_description' => '<p class="pricing_sentence">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sodales euismod justo, non elementum risus rutrum quis.</p>
                            <ul class="pricing_list">
                                <li>Support forum</li>
                                <li>Free hosting</li>
                                <li>40MB of storage space</li>
                                <li>Social media integration</li>
                                <li>1GB of storage space</li>
                            </ul>',
            'conten' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sodales euismod justo, non elementum risus rutrum quis. Etiam pulvinar dictum nisi, at porta sapien euismod non. Aenean sodales augue pharetra leo congue tristique. Etiam ultricies nibh lorem, vitae tempus est efficitur eu. Praesent nisl augue, auctor eget posuere eget, pellentesque vitae lectus. Praesent aliquet molestie lorem, vitae condimentum sapien iaculis sit amet. Aliquam sit amet dui non urna pulvinar hendrerit a a lorem. Ut mollis erat id erat convallis consectetur. Duis quam est, ultricies id faucibus viverra, faucibus quis libero. Ut lacinia viverra sapien et bibendum. Cras id quam tellus. Ut tristique eleifend eros id vulputate. Suspendisse sollicitudin lorem in ante vehicula fermentum. Sed justo nisi, sodales eleifend leo ut, finibus hendrerit purus. Sed egestas ex vel feugiat mollis. Fusce condimentum ipsum ut sem aliquam lacinia.',
            'meta_title' => '',
            'meta_keyword' => '',
            'meta_description' => '',
            'position' => 'program',
            'published' => '1',
            'link' => 'program',
            'slug' => str_slug('Room Division'),
            'parent_id' => $programid->id,
            'lang' => 'id',
            'equal_id' => $arteqid
        ]);
        $program1en = Article::create([
            'title' => 'Room Division',
            'thumb_image' => '',
            'short_description' => '<p class="pricing_sentence">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sodales euismod justo, non elementum risus rutrum quis.</p>
                            <ul class="pricing_list">
                                <li>Support forum</li>
                                <li>Free hosting</li>
                                <li>40MB of storage space</li>
                                <li>Social media integration</li>
                                <li>1GB of storage space</li>
                            </ul>',
            'conten' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sodales euismod justo, non elementum risus rutrum quis. Etiam pulvinar dictum nisi, at porta sapien euismod non. Aenean sodales augue pharetra leo congue tristique. Etiam ultricies nibh lorem, vitae tempus est efficitur eu. Praesent nisl augue, auctor eget posuere eget, pellentesque vitae lectus. Praesent aliquet molestie lorem, vitae condimentum sapien iaculis sit amet. Aliquam sit amet dui non urna pulvinar hendrerit a a lorem. Ut mollis erat id erat convallis consectetur. Duis quam est, ultricies id faucibus viverra, faucibus quis libero. Ut lacinia viverra sapien et bibendum. Cras id quam tellus. Ut tristique eleifend eros id vulputate. Suspendisse sollicitudin lorem in ante vehicula fermentum. Sed justo nisi, sodales eleifend leo ut, finibus hendrerit purus. Sed egestas ex vel feugiat mollis. Fusce condimentum ipsum ut sem aliquam lacinia.',
            'meta_title' => '',
            'meta_keyword' => '',
            'meta_description' => '',
            'position' => 'program',
            'published' => '1',
            'link' => 'program',
            'slug' => str_slug('Room Division'),
            'parent_id' => $programen->id,
            'lang' => 'en',
            'equal_id' => $arteqid
        ]);

        $imgeqid = uniqid('IMG', true);
        $hprg1im1id = \App\Images::create([
            'name' => 'Header Image Program 1_1',
            'image' => 'event-detail.jpg',
            'type' => 'page-header',
            'article_id' => $program1id->id,
            'lang' => 'id',
            'equal_id' => $imgeqid
        ]);
        $hprg1im1en = \App\Images::create([
            'name' => 'Header Image Program 1_1',
            'image' => 'event-detail.jpg',
            'type' => 'page-header',
            'article_id' => $program1en->id,
            'lang' => 'en',
            'equal_id' => $imgeqid
        ]);

        $imgeqid = uniqid('IMG', true);
        $hprg1im2id = \App\Images::create([
            'name' => 'Header Image Program 1_2',
            'image' => 'event-detail.jpg',
            'type' => 'page-header',
            'article_id' => $program1id->id,
            'lang' => 'id',
            'equal_id' => $imgeqid
        ]);
        $hprg1im2en = \App\Images::create([
            'name' => 'Header Image Program 1_2',
            'image' => 'event-detail.jpg',
            'type' => 'page-header',
            'article_id' => $program1en->id,
            'lang' => 'en',
            'equal_id' => $imgeqid
        ]);

        $arteqid = uniqid('ART', true);
        $program2id = Article::create([
            'title' => 'Food and Bartender Division',
            'thumb_image' => '',
            'short_description' => '<p class="pricing_sentence">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sodales euismod justo, non elementum risus rutrum quis.</p>
                            <ul class="pricing_list">
                                <li>Unlimited calls</li>
                                <li>Free hosting</li>
                                <li>10 hours of support</li>
                                <li>Social media integration</li>
                                <li>1GB of storage space</li>
                            </ul>',
            'conten' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sodales euismod justo, non elementum risus rutrum quis. Etiam pulvinar dictum nisi, at porta sapien euismod non. Aenean sodales augue pharetra leo congue tristique. Etiam ultricies nibh lorem, vitae tempus est efficitur eu. Praesent nisl augue, auctor eget posuere eget, pellentesque vitae lectus. Praesent aliquet molestie lorem, vitae condimentum sapien iaculis sit amet. Aliquam sit amet dui non urna pulvinar hendrerit a a lorem. Ut mollis erat id erat convallis consectetur. Duis quam est, ultricies id faucibus viverra, faucibus quis libero. Ut lacinia viverra sapien et bibendum. Cras id quam tellus. Ut tristique eleifend eros id vulputate. Suspendisse sollicitudin lorem in ante vehicula fermentum. Sed justo nisi, sodales eleifend leo ut, finibus hendrerit purus. Sed egestas ex vel feugiat mollis. Fusce condimentum ipsum ut sem aliquam lacinia.',
            'meta_title' => '',
            'meta_keyword' => '',
            'meta_description' => '',
            'position' => 'program',
            'published' => '1',
            'link' => 'program',
            'slug' => str_slug('Food and Bartender Division'),
            'parent_id' => $programid->id,
            'lang' => 'id',
            'equal_id' => $arteqid
        ]);
        $program2en = Article::create([
            'title' => 'Food and Bartender Division',
            'thumb_image' => '',
            'short_description' => '<p class="pricing_sentence">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sodales euismod justo, non elementum risus rutrum quis.</p>
                            <ul class="pricing_list">
                                <li>Unlimited calls</li>
                                <li>Free hosting</li>
                                <li>10 hours of support</li>
                                <li>Social media integration</li>
                                <li>1GB of storage space</li>
                            </ul>',
            'conten' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sodales euismod justo, non elementum risus rutrum quis. Etiam pulvinar dictum nisi, at porta sapien euismod non. Aenean sodales augue pharetra leo congue tristique. Etiam ultricies nibh lorem, vitae tempus est efficitur eu. Praesent nisl augue, auctor eget posuere eget, pellentesque vitae lectus. Praesent aliquet molestie lorem, vitae condimentum sapien iaculis sit amet. Aliquam sit amet dui non urna pulvinar hendrerit a a lorem. Ut mollis erat id erat convallis consectetur. Duis quam est, ultricies id faucibus viverra, faucibus quis libero. Ut lacinia viverra sapien et bibendum. Cras id quam tellus. Ut tristique eleifend eros id vulputate. Suspendisse sollicitudin lorem in ante vehicula fermentum. Sed justo nisi, sodales eleifend leo ut, finibus hendrerit purus. Sed egestas ex vel feugiat mollis. Fusce condimentum ipsum ut sem aliquam lacinia.',
            'meta_title' => '',
            'meta_keyword' => '',
            'meta_description' => '',
            'position' => 'program',
            'published' => '1',
            'link' => 'program',
            'slug' => str_slug('Food and Bartender Division'),
            'parent_id' => $programen->id,
            'lang' => 'en',
            'equal_id' => $arteqid
        ]);

        $arteqid = uniqid('ART', true);
        $fasilitasid = Article::create([
            'title' => 'Fasilitas',
            'thumb_image' => '',
            'conten' => 'Fasilitas',
            'meta_title' => '',
            'meta_keyword' => '',
            'meta_description' => '',
            'position' => 'menu-utama',
            'published' => '1',
            'link' => 'fasilitas',
            'more_config' => '1',
            'admin_config' => '1',
            'lang' => 'id',
            'equal_id' => $arteqid
        ]);
        $fasilitasen = Article::create([
            'title' => 'Facilities',
            'thumb_image' => '',
            'conten' => 'Facilities',
            'meta_title' => '',
            'meta_keyword' => '',
            'meta_description' => '',
            'position' => 'menu-utama',
            'published' => '1',
            'link' => 'facilities',
            'more_config' => '1',
            'admin_config' => '1',
            'lang' => 'en',
            'equal_id' => $arteqid
        ]);

        $arteqid = uniqid('ART', true);
        $fasilitas1id = Article::create([
            'title' => 'Fasilitas 1',
            'thumb_image' => 'courses1.jpg',
            'short_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa.',
            'conten' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa. Aliquam ultricies tincidunt felis sed consequat. Praesent vitae eros sit amet lorem volutpat volutpat. Nunc quis ipsum vulputate mauris commodo auctor a id sem. Morbi suscipit libero augue, sed pharetra turpis posuere sed. Donec elementum tincidunt augue, sed tincidunt nulla fringilla sit amet. Donec vitae aliquet felis, quis cursus ligula. Sed euismod tincidunt tempus. Morbi eget lectus at ipsum pretium pretium. Duis lobortis, dolor id iaculis interdum, leo leo eleifend nisl, tempus semper erat nibh non nisi. Sed elit mi, fermentum nec commodo ac, viverra ut ante',
            'meta_title' => '',
            'meta_keyword' => '',
            'meta_description' => '',
            'position' => 'fasilitas',
            'published' => '1',
            'link' => 'fasilitas',
            'slug' => str_slug('Fasilitas 1'),
            'parent_id' => $fasilitasid->id,
            'lang' => 'id',
            'equal_id' => $arteqid
        ]);
        $fasilitas1en = Article::create([
            'title' => 'Facilities 1',
            'thumb_image' => 'courses1.jpg',
            'short_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa.',
            'conten' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa. Aliquam ultricies tincidunt felis sed consequat. Praesent vitae eros sit amet lorem volutpat volutpat. Nunc quis ipsum vulputate mauris commodo auctor a id sem. Morbi suscipit libero augue, sed pharetra turpis posuere sed. Donec elementum tincidunt augue, sed tincidunt nulla fringilla sit amet. Donec vitae aliquet felis, quis cursus ligula. Sed euismod tincidunt tempus. Morbi eget lectus at ipsum pretium pretium. Duis lobortis, dolor id iaculis interdum, leo leo eleifend nisl, tempus semper erat nibh non nisi. Sed elit mi, fermentum nec commodo ac, viverra ut ante',
            'meta_title' => '',
            'meta_keyword' => '',
            'meta_description' => '',
            'position' => 'fasilitas',
            'published' => '1',
            'link' => 'facilities',
            'slug' => str_slug('Facilities 1'),
            'parent_id' => $fasilitasen->id,
            'lang' => 'en',
            'equal_id' => $arteqid
        ]);

        $imgeqid = uniqid('IMG', true);
        $hfs1im2id = \App\Images::create([
            'name' => 'Header Image Fasilitas 1_2',
            'image' => 'event-detail.jpg',
            'type' => 'page-header',
            'article_id' => $fasilitas1id->id,
            'lang' => 'id',
            'equal_id' => $imgeqid
        ]);
        $hfs1im2en = \App\Images::create([
            'name' => 'Header Image Fasilitas 1_2',
            'image' => 'event-detail.jpg',
            'type' => 'page-header',
            'article_id' => $fasilitas1en->id,
            'lang' => 'en',
            'equal_id' => $imgeqid
        ]);

        $arteqid = uniqid('ART', true);
        $fasilitas2id = Article::create([
            'title' => 'Fasilitas 2',
            'thumb_image' => 'courses2.jpg',
            'short_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa.',
            'conten' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa. Aliquam ultricies tincidunt felis sed consequat. Praesent vitae eros sit amet lorem volutpat volutpat. Nunc quis ipsum vulputate mauris commodo auctor a id sem. Morbi suscipit libero augue, sed pharetra turpis posuere sed. Donec elementum tincidunt augue, sed tincidunt nulla fringilla sit amet. Donec vitae aliquet felis, quis cursus ligula. Sed euismod tincidunt tempus. Morbi eget lectus at ipsum pretium pretium. Duis lobortis, dolor id iaculis interdum, leo leo eleifend nisl, tempus semper erat nibh non nisi. Sed elit mi, fermentum nec commodo ac, viverra ut ante',
            'meta_title' => '',
            'meta_keyword' => '',
            'meta_description' => '',
            'position' => 'fasilitas',
            'published' => '1',
            'link' => 'fasilitas',
            'slug' => str_slug('Fasilitas 2'),
            'parent_id' => $fasilitasid->id,
            'lang' => 'id',
            'equal_id' => $arteqid
        ]);
        $fasilitas2en = Article::create([
            'title' => 'Facilities 2',
            'thumb_image' => 'courses2.jpg',
            'short_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa.',
            'conten' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa. Aliquam ultricies tincidunt felis sed consequat. Praesent vitae eros sit amet lorem volutpat volutpat. Nunc quis ipsum vulputate mauris commodo auctor a id sem. Morbi suscipit libero augue, sed pharetra turpis posuere sed. Donec elementum tincidunt augue, sed tincidunt nulla fringilla sit amet. Donec vitae aliquet felis, quis cursus ligula. Sed euismod tincidunt tempus. Morbi eget lectus at ipsum pretium pretium. Duis lobortis, dolor id iaculis interdum, leo leo eleifend nisl, tempus semper erat nibh non nisi. Sed elit mi, fermentum nec commodo ac, viverra ut ante',
            'meta_title' => '',
            'meta_keyword' => '',
            'meta_description' => '',
            'position' => 'fasilitas',
            'published' => '1',
            'link' => 'facilities',
            'slug' => str_slug('Facilities 2'),
            'parent_id' => $fasilitasen->id,
            'lang' => 'en',
            'equal_id' => $arteqid
        ]);

        $arteqid = uniqid('ART', true);
        $fasilitas3id = Article::create([
            'title' => 'Fasilitas 3',
            'thumb_image' => 'courses3.jpg',
            'short_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa.',
            'conten' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa. Aliquam ultricies tincidunt felis sed consequat. Praesent vitae eros sit amet lorem volutpat volutpat. Nunc quis ipsum vulputate mauris commodo auctor a id sem. Morbi suscipit libero augue, sed pharetra turpis posuere sed. Donec elementum tincidunt augue, sed tincidunt nulla fringilla sit amet. Donec vitae aliquet felis, quis cursus ligula. Sed euismod tincidunt tempus. Morbi eget lectus at ipsum pretium pretium. Duis lobortis, dolor id iaculis interdum, leo leo eleifend nisl, tempus semper erat nibh non nisi. Sed elit mi, fermentum nec commodo ac, viverra ut ante',
            'meta_title' => '',
            'meta_keyword' => '',
            'meta_description' => '',
            'position' => 'fasilitas',
            'published' => '1',
            'link' => 'fasilitas',
            'slug' => str_slug('Fasilitas 3'),
            'parent_id' => $fasilitasid->id,
            'lang' => 'id',
            'equal_id' => $arteqid
        ]);
        $fasilitas3en = Article::create([
            'title' => 'Facilities 3',
            'thumb_image' => 'courses3.jpg',
            'short_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa.',
            'conten' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa. Aliquam ultricies tincidunt felis sed consequat. Praesent vitae eros sit amet lorem volutpat volutpat. Nunc quis ipsum vulputate mauris commodo auctor a id sem. Morbi suscipit libero augue, sed pharetra turpis posuere sed. Donec elementum tincidunt augue, sed tincidunt nulla fringilla sit amet. Donec vitae aliquet felis, quis cursus ligula. Sed euismod tincidunt tempus. Morbi eget lectus at ipsum pretium pretium. Duis lobortis, dolor id iaculis interdum, leo leo eleifend nisl, tempus semper erat nibh non nisi. Sed elit mi, fermentum nec commodo ac, viverra ut ante',
            'meta_title' => '',
            'meta_keyword' => '',
            'meta_description' => '',
            'position' => 'fasilitas',
            'published' => '1',
            'link' => 'facilities',
            'slug' => str_slug('Facilities 3'),
            'parent_id' => $fasilitasen->id,
            'lang' => 'en',
            'equal_id' => $arteqid
        ]);

        $arteqid = uniqid('ART', true);
        $fasilitas4id = Article::create([
            'title' => 'Fasilitas 4',
            'thumb_image' => 'courses4.jpg',
            'short_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa.',
            'conten' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa. Aliquam ultricies tincidunt felis sed consequat. Praesent vitae eros sit amet lorem volutpat volutpat. Nunc quis ipsum vulputate mauris commodo auctor a id sem. Morbi suscipit libero augue, sed pharetra turpis posuere sed. Donec elementum tincidunt augue, sed tincidunt nulla fringilla sit amet. Donec vitae aliquet felis, quis cursus ligula. Sed euismod tincidunt tempus. Morbi eget lectus at ipsum pretium pretium. Duis lobortis, dolor id iaculis interdum, leo leo eleifend nisl, tempus semper erat nibh non nisi. Sed elit mi, fermentum nec commodo ac, viverra ut ante',
            'meta_title' => '',
            'meta_keyword' => '',
            'meta_description' => '',
            'position' => 'fasilitas',
            'published' => '1',
            'link' => 'fasilitas',
            'slug' => str_slug('Fasilitas 4'),
            'parent_id' => $fasilitasid->id,
            'lang' => 'id',
            'equal_id' => $arteqid
        ]);
        $fasilitas4en = Article::create([
            'title' => 'Facilities 4',
            'thumb_image' => 'courses4.jpg',
            'short_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa.',
            'conten' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa. Aliquam ultricies tincidunt felis sed consequat. Praesent vitae eros sit amet lorem volutpat volutpat. Nunc quis ipsum vulputate mauris commodo auctor a id sem. Morbi suscipit libero augue, sed pharetra turpis posuere sed. Donec elementum tincidunt augue, sed tincidunt nulla fringilla sit amet. Donec vitae aliquet felis, quis cursus ligula. Sed euismod tincidunt tempus. Morbi eget lectus at ipsum pretium pretium. Duis lobortis, dolor id iaculis interdum, leo leo eleifend nisl, tempus semper erat nibh non nisi. Sed elit mi, fermentum nec commodo ac, viverra ut ante',
            'meta_title' => '',
            'meta_keyword' => '',
            'meta_description' => '',
            'position' => 'fasilitas',
            'published' => '1',
            'link' => 'facilities',
            'slug' => str_slug('Facilities 4'),
            'parent_id' => $fasilitasen->id,
            'lang' => 'en',
            'equal_id' => $arteqid
        ]);

        $arteqid = uniqid('ART', true);
        $fasilitas5id = Article::create([
            'title' => 'Fasilitas 5',
            'thumb_image' => 'courses5.jpg',
            'short_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa.',
            'conten' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa. Aliquam ultricies tincidunt felis sed consequat. Praesent vitae eros sit amet lorem volutpat volutpat. Nunc quis ipsum vulputate mauris commodo auctor a id sem. Morbi suscipit libero augue, sed pharetra turpis posuere sed. Donec elementum tincidunt augue, sed tincidunt nulla fringilla sit amet. Donec vitae aliquet felis, quis cursus ligula. Sed euismod tincidunt tempus. Morbi eget lectus at ipsum pretium pretium. Duis lobortis, dolor id iaculis interdum, leo leo eleifend nisl, tempus semper erat nibh non nisi. Sed elit mi, fermentum nec commodo ac, viverra ut ante',
            'meta_title' => '',
            'meta_keyword' => '',
            'meta_description' => '',
            'position' => 'fasilitas',
            'published' => '1',
            'link' => 'fasilitas',
            'slug' => str_slug('Fasilitas 5'),
            'parent_id' => $fasilitasid->id,
            'lang' => 'id',
            'equal_id' => $arteqid
        ]);
        $fasilitas5en = Article::create([
            'title' => 'Facilities 5',
            'thumb_image' => 'courses5.jpg',
            'short_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa.',
            'conten' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa. Aliquam ultricies tincidunt felis sed consequat. Praesent vitae eros sit amet lorem volutpat volutpat. Nunc quis ipsum vulputate mauris commodo auctor a id sem. Morbi suscipit libero augue, sed pharetra turpis posuere sed. Donec elementum tincidunt augue, sed tincidunt nulla fringilla sit amet. Donec vitae aliquet felis, quis cursus ligula. Sed euismod tincidunt tempus. Morbi eget lectus at ipsum pretium pretium. Duis lobortis, dolor id iaculis interdum, leo leo eleifend nisl, tempus semper erat nibh non nisi. Sed elit mi, fermentum nec commodo ac, viverra ut ante',
            'meta_title' => '',
            'meta_keyword' => '',
            'meta_description' => '',
            'position' => 'fasilitas',
            'published' => '1',
            'link' => 'facilities',
            'slug' => str_slug('Facilities 5'),
            'parent_id' => $fasilitasen->id,
            'lang' => 'en',
            'equal_id' => $arteqid
        ]);

        $arteqid = uniqid('ART', true);
        $fasilitas6id = Article::create([
            'title' => 'Fasilitas 6',
            'thumb_image' => 'courses6.jpg',
            'short_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa.',
            'conten' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa. Aliquam ultricies tincidunt felis sed consequat. Praesent vitae eros sit amet lorem volutpat volutpat. Nunc quis ipsum vulputate mauris commodo auctor a id sem. Morbi suscipit libero augue, sed pharetra turpis posuere sed. Donec elementum tincidunt augue, sed tincidunt nulla fringilla sit amet. Donec vitae aliquet felis, quis cursus ligula. Sed euismod tincidunt tempus. Morbi eget lectus at ipsum pretium pretium. Duis lobortis, dolor id iaculis interdum, leo leo eleifend nisl, tempus semper erat nibh non nisi. Sed elit mi, fermentum nec commodo ac, viverra ut ante',
            'meta_title' => '',
            'meta_keyword' => '',
            'meta_description' => '',
            'position' => 'fasilitas',
            'published' => '1',
            'link' => 'fasilitas',
            'slug' => str_slug('Fasilitas 6'),
            'parent_id' => $fasilitasid->id,
            'lang' => 'id',
            'equal_id' => $arteqid
        ]);
        $fasilitas6en = Article::create([
            'title' => 'Facilities 6',
            'thumb_image' => 'courses6.jpg',
            'short_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa.',
            'conten' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa. Aliquam ultricies tincidunt felis sed consequat. Praesent vitae eros sit amet lorem volutpat volutpat. Nunc quis ipsum vulputate mauris commodo auctor a id sem. Morbi suscipit libero augue, sed pharetra turpis posuere sed. Donec elementum tincidunt augue, sed tincidunt nulla fringilla sit amet. Donec vitae aliquet felis, quis cursus ligula. Sed euismod tincidunt tempus. Morbi eget lectus at ipsum pretium pretium. Duis lobortis, dolor id iaculis interdum, leo leo eleifend nisl, tempus semper erat nibh non nisi. Sed elit mi, fermentum nec commodo ac, viverra ut ante',
            'meta_title' => '',
            'meta_keyword' => '',
            'meta_description' => '',
            'position' => 'fasilitas',
            'published' => '1',
            'link' => 'facilities',
            'slug' => str_slug('Facilities 6'),
            'parent_id' => $fasilitasen->id,
            'lang' => 'en',
            'equal_id' => $arteqid
        ]);

        $arteqid = uniqid('ART', true);
        $aktivitasid = Article::create([
            'title' => 'Aktivitas',
            'thumb_image' => '',
            'conten' => 'Aktivitas',
            'meta_title' => '',
            'meta_keyword' => '',
            'meta_description' => '',
            'position' => 'menu-utama',
            'published' => '1',
            'link' => 'aktivitas',
            'more_config' => '1',
            'admin_config' => '1',
            'lang' => 'id',
            'equal_id' => $arteqid
        ]);
        $aktivitasen = Article::create([
            'title' => 'Activities',
            'thumb_image' => '',
            'conten' => 'Activities',
            'meta_title' => '',
            'meta_keyword' => '',
            'meta_description' => '',
            'position' => 'menu-utama',
            'published' => '1',
            'link' => 'activities',
            'more_config' => '1',
            'admin_config' => '1',
            'lang' => 'en',
            'equal_id' => $arteqid
        ]);

        $cateqid = uniqid('CAT', true);
        $cataktivitas1id = Category::create([
            'category' => 'Program',
            'type' => 'aktivitas',
            'slug' => str_slug('Program'),
            'lang' => 'id',
            'equal_id' => $cateqid
        ]);
        $cataktivitas1en = Category::create([
            'category' => 'Courses',
            'type' => 'aktivitas',
            'slug' => str_slug('Courses'),
            'lang' => 'en',
            'equal_id' => $cateqid
        ]);

        $cateqid = uniqid('CAT', true);
        $cataktivitas2id = Category::create([
            'category' => 'Buku',
            'type' => 'aktivitas',
            'slug' => str_slug('Buku'),
            'lang' => 'id',
            'equal_id' => $cateqid
        ]);
        $cataktivitas2en = Category::create([
            'category' => 'Books',
            'type' => 'aktivitas',
            'slug' => str_slug('Books'),
            'lang' => 'en',
            'equal_id' => $cateqid
        ]);

        $cateqid = uniqid('CAT', true);
        $cataktivitas3id = Category::create([
            'category' => 'Kegiatan',
            'type' => 'aktivitas',
            'slug' => str_slug('Kegiatan'),
            'lang' => 'id',
            'equal_id' => $cateqid
        ]);
        $cataktivitas3en = Category::create([
            'category' => 'Event',
            'type' => 'aktivitas',
            'slug' => str_slug('Event'),
            'lang' => 'en',
            'equal_id' => $cateqid
        ]);

        $cateqid = uniqid('CAT', true);
        $cataktivitas4id = Category::create([
            'category' => 'Mahasiswa',
            'type' => 'aktivitas',
            'slug' => str_slug('Mahasiswa'),
            'lang' => 'id',
            'equal_id' => $cateqid
        ]);
        $cataktivitas4en = Category::create([
            'category' => 'Students',
            'type' => 'aktivitas',
            'slug' => str_slug('Students'),
            'lang' => 'en',
            'equal_id' => $cateqid
        ]);

        $cateqid = uniqid('CAT', true);
        $cataktivitas5id = Category::create([
            'category' => 'Pengajar',
            'type' => 'aktivitas',
            'slug' => str_slug('Pengajar'),
            'lang' => 'id',
            'equal_id' => $cateqid
        ]);
        $cataktivitas5en = Category::create([
            'category' => 'Teachers',
            'type' => 'aktivitas',
            'slug' => str_slug('Teachers'),
            'lang' => 'en',
            'equal_id' => $cateqid
        ]);

        $imgeqid = uniqid('IMG', true);
        $imaktivitas1id = \App\Images::create([
            'name' => 'Aktivitas 1',
            'image' => 'gallery1.jpg',
            'type' => 'aktivitas',
            'article_id' => $aktivitasid->id,
            'lang' => 'id',
            'equal_id' => $imgeqid
        ]);
        $imaktivitas1en = \App\Images::create([
            'name' => 'Activities 1',
            'image' => 'gallery1.jpg',
            'type' => 'aktivitas',
            'article_id' => $aktivitasen->id,
            'lang' => 'en',
            'equal_id' => $imgeqid
        ]);

        $imgeqid = uniqid('IMG', true);
        $imaktivitas2id = \App\Images::create([
            'name' => 'Aktivitas 2',
            'image' => 'gallery2.jpg',
            'type' => 'aktivitas',
            'article_id' => $aktivitasid->id,
            'lang' => 'id',
            'equal_id' => $imgeqid
        ]);
        $imaktivitas2en = \App\Images::create([
            'name' => 'Activities 2',
            'image' => 'gallery2.jpg',
            'type' => 'aktivitas',
            'article_id' => $aktivitasen->id,
            'lang' => 'en',
            'equal_id' => $imgeqid
        ]);

        $imgeqid = uniqid('IMG', true);
        $imaktivitas3id = \App\Images::create([
            'name' => 'Aktivitas 3',
            'image' => 'gallery3.jpg',
            'type' => 'aktivitas',
            'article_id' => $aktivitasid->id,
            'lang' => 'id',
            'equal_id' => $imgeqid
        ]);
        $imaktivitas3en = \App\Images::create([
            'name' => 'Activities 3',
            'image' => 'gallery3.jpg',
            'type' => 'aktivitas',
            'article_id' => $aktivitasen->id,
            'lang' => 'en',
            'equal_id' => $imgeqid
        ]);

        $imgeqid = uniqid('IMG', true);
        $imaktivitas4id = \App\Images::create([
            'name' => 'Aktivitas 4',
            'image' => 'gallery4.jpg',
            'type' => 'aktivitas',
            'article_id' => $aktivitasid->id,
            'lang' => 'id',
            'equal_id' => $imgeqid
        ]);
        $imaktivitas4en = \App\Images::create([
            'name' => 'Activities 4',
            'image' => 'gallery4.jpg',
            'type' => 'aktivitas',
            'article_id' => $aktivitasen->id,
            'lang' => 'en',
            'equal_id' => $imgeqid
        ]);

        $imgeqid = uniqid('IMG', true);
        $imaktivitas5id = \App\Images::create([
            'name' => 'Aktivitas 5',
            'image' => 'gallery5.jpg',
            'type' => 'aktivitas',
            'article_id' => $aktivitasid->id,
            'lang' => 'id',
            'equal_id' => $imgeqid
        ]);
        $imaktivitas5en = \App\Images::create([
            'name' => 'Activities 5',
            'image' => 'gallery5.jpg',
            'type' => 'aktivitas',
            'article_id' => $aktivitasen->id,
            'lang' => 'en',
            'equal_id' => $imgeqid
        ]);

        $imgeqid = uniqid('IMG', true);
        $imaktivitas6id = \App\Images::create([
            'name' => 'Aktivitas 6',
            'image' => 'gallery6.jpg',
            'type' => 'aktivitas',
            'article_id' => $aktivitasid->id,
            'lang' => 'id',
            'equal_id' => $imgeqid
        ]);
        $imaktivitas6en = \App\Images::create([
            'name' => 'Activities 6',
            'image' => 'gallery6.jpg',
            'type' => 'aktivitas',
            'article_id' => $aktivitasen->id,
            'lang' => 'en',
            'equal_id' => $imgeqid
        ]);

        $imgeqid = uniqid('IMG', true);
        $imaktivitas7id = \App\Images::create([
            'name' => 'Aktivitas 7',
            'image' => 'gallery7.jpg',
            'type' => 'aktivitas',
            'article_id' => $aktivitasid->id,
            'lang' => 'id',
            'equal_id' => $imgeqid
        ]);
        $imaktivitas7en = \App\Images::create([
            'name' => 'Activities 7',
            'image' => 'gallery7.jpg',
            'type' => 'aktivitas',
            'article_id' => $aktivitasen->id,
            'lang' => 'en',
            'equal_id' => $imgeqid
        ]);

        $imgeqid = uniqid('IMG', true);
        $imaktivitas8id = \App\Images::create([
            'name' => 'Aktivitas 8',
            'image' => 'gallery8.jpg',
            'type' => 'aktivitas',
            'article_id' => $aktivitasid->id,
            'lang' => 'id',
            'equal_id' => $imgeqid
        ]);
        $imaktivitas8en = \App\Images::create([
            'name' => 'Activities 8',
            'image' => 'gallery8.jpg',
            'type' => 'aktivitas',
            'article_id' => $aktivitasen->id,
            'lang' => 'en',
            'equal_id' => $imgeqid
        ]);

        $imgeqid = uniqid('IMG', true);
        $imaktivitas9id = \App\Images::create([
            'name' => 'Aktivitas 9',
            'image' => 'gallery9.jpg',
            'type' => 'aktivitas',
            'article_id' => $aktivitasid->id,
            'lang' => 'id',
            'equal_id' => $imgeqid
        ]);
        $imaktivitas9en = \App\Images::create([
            'name' => 'Activities 9',
            'image' => 'gallery9.jpg',
            'type' => 'aktivitas',
            'article_id' => $aktivitasen->id,
            'lang' => 'en',
            'equal_id' => $imgeqid
        ]);

        $imgeqid = uniqid('IMG', true);
        $imaktivitas10id = \App\Images::create([
            'name' => 'Aktivitas 10',
            'image' => 'gallery10.jpg',
            'type' => 'aktivitas',
            'article_id' => $aktivitasid->id,
            'lang' => 'id',
            'equal_id' => $imgeqid
        ]);
        $imaktivitas10en = \App\Images::create([
            'name' => 'Activities 10',
            'image' => 'gallery10.jpg',
            'type' => 'aktivitas',
            'article_id' => $aktivitasen->id,
            'lang' => 'en',
            'equal_id' => $imgeqid
        ]);

        $imgeqid = uniqid('IMG', true);
        $imaktivitas11id = \App\Images::create([
            'name' => 'Aktivitas 11',
            'image' => 'gallery11.jpg',
            'type' => 'aktivitas',
            'article_id' => $aktivitasid->id,
            'lang' => 'id',
            'equal_id' => $imgeqid
        ]);
        $imaktivitas11en = \App\Images::create([
            'name' => 'Activities 11',
            'image' => 'gallery11.jpg',
            'type' => 'aktivitas',
            'article_id' => $aktivitasen->id,
            'lang' => 'en',
            'equal_id' => $imgeqid
        ]);

        $imgeqid = uniqid('IMG', true);
        $imaktivitas12id = \App\Images::create([
            'name' => 'Aktivitas 12',
            'image' => 'gallery12.jpg',
            'type' => 'aktivitas',
            'article_id' => $aktivitasid->id,
            'lang' => 'id',
            'equal_id' => $imgeqid
        ]);
        $imaktivitas12en = \App\Images::create([
            'name' => 'Activities 12',
            'image' => 'gallery12.jpg',
            'type' => 'aktivitas',
            'article_id' => $aktivitasen->id,
            'lang' => 'en',
            'equal_id' => $imgeqid
        ]);

        $cataktivitas1id->images()->attach([$imaktivitas1id->id, $imaktivitas2id->id, $imaktivitas4id->id]);
        $cataktivitas2id->images()->attach([$imaktivitas2id->id, $imaktivitas4id->id, $imaktivitas11id->id]);
        $cataktivitas3id->images()->attach([$imaktivitas6id->id, $imaktivitas5id->id, $imaktivitas7id->id, $imaktivitas10id->id]);
        $cataktivitas4id->images()->attach([$imaktivitas6id->id, $imaktivitas8id->id, $imaktivitas10id->id, $imaktivitas11id->id]);
        $cataktivitas5id->images()->attach([$imaktivitas3id->id, $imaktivitas9id->id, $imaktivitas12id->id]);

        $cataktivitas1en->images()->attach([$imaktivitas1en->id, $imaktivitas2en->id, $imaktivitas4en->id]);
        $cataktivitas2en->images()->attach([$imaktivitas2en->id, $imaktivitas4en->id, $imaktivitas11en->id]);
        $cataktivitas3en->images()->attach([$imaktivitas6en->id, $imaktivitas5en->id, $imaktivitas7en->id, $imaktivitas10en->id]);
        $cataktivitas4en->images()->attach([$imaktivitas6en->id, $imaktivitas8en->id, $imaktivitas10en->id, $imaktivitas11en->id]);
        $cataktivitas5en->images()->attach([$imaktivitas3en->id, $imaktivitas9en->id, $imaktivitas12en->id]);

        $arteqid = uniqid('ART', true);
        $contactid = Article::create([
            'title' => 'Hubungi Kami',
            'thumb_image' => '',
            'conten' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod',
            'meta_title' => '',
            'meta_keyword' => '',
            'meta_description' => '',
            'position' => 'menu-utama',
            'published' => '1',
            'link' => 'hubungi-kami',
            'latitude' => '-8.6403911',
            'longitude' => '115.2282392',
            'more_config' => '1',
            'admin_config' => '1',
            'lang' => 'id',
            'equal_id' => $arteqid
        ]);
        $contacten = Article::create([
            'title' => 'Contact Us',
            'thumb_image' => '',
            'conten' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod',
            'meta_title' => '',
            'meta_keyword' => '',
            'meta_description' => '',
            'position' => 'menu-utama',
            'published' => '1',
            'link' => 'contact-us',
            'latitude' => '-8.6403911',
            'longitude' => '115.2282392',
            'more_config' => '1',
            'admin_config' => '1',
            'lang' => 'en',
            'equal_id' => $arteqid
        ]);

        $arteqid = uniqid('ART', true);
        $ctofficeid = Article::create([
            'title' => 'Kantor Utama',
            'thumb_image' => '',
            'conten' => 'Jln. Ratna 68 H, Denpasar',
            'meta_title' => '',
            'meta_keyword' => '',
            'meta_description' => '',
            'position' => 'page',
            'published' => '1',
            'slug' => 'kantor-utama',
            'parent_id' => $contactid->id,
            'lang' => 'id',
            'equal_id' => $arteqid
        ]);
        $ctofficeen = Article::create([
            'title' => 'Head Office',
            'thumb_image' => '',
            'conten' => 'Jln. Ratna 68 H, Denpasar',
            'meta_title' => '',
            'meta_keyword' => '',
            'meta_description' => '',
            'position' => 'page',
            'published' => '1',
            'slug' => 'head-office',
            'parent_id' => $contacten->id,
            'lang' => 'en',
            'equal_id' => $arteqid
        ]);

        $arteqid = uniqid('ART', true);
        $ctcallid = Article::create([
            'title' => 'Hubungi Kami',
            'thumb_image' => '',
            'conten' => '+6236123456',
            'meta_title' => '',
            'meta_keyword' => '',
            'meta_description' => '',
            'position' => 'page',
            'published' => '1',
            'slug' => 'hubungi-kami',
            'parent_id' => $contactid->id,
            'lang' => 'id',
            'equal_id' => $arteqid
        ]);
        $ctcallen = Article::create([
            'title' => 'Call Us',
            'thumb_image' => '',
            'conten' => '+6236123456',
            'meta_title' => '',
            'meta_keyword' => '',
            'meta_description' => '',
            'position' => 'page',
            'published' => '1',
            'slug' => 'call-us',
            'parent_id' => $contacten->id,
            'lang' => 'en',
            'equal_id' => $arteqid
        ]);

        $arteqid = uniqid('ART', true);
        $ctemailid = Article::create([
            'title' => 'Email Kami',
            'thumb_image' => '',
            'conten' => 'info@domain.com <br>support@domain.com',
            'meta_title' => '',
            'meta_keyword' => '',
            'meta_description' => '',
            'position' => 'page',
            'published' => '1',
            'slug' => 'email-kami',
            'parent_id' => $contactid->id,
            'lang' => 'id',
            'equal_id' => $arteqid
        ]);
        $ctemailen = Article::create([
            'title' => 'Email Us',
            'thumb_image' => '',
            'conten' => 'info@domain.com <br>support@domain.com',
            'meta_title' => '',
            'meta_keyword' => '',
            'meta_description' => '',
            'position' => 'page',
            'published' => '1',
            'slug' => 'email-us',
            'parent_id' => $contacten->id,
            'lang' => 'en',
            'equal_id' => $arteqid
        ]);

        $arteqid = uniqid('ART', true);
        $footeraboutid = Article::create([
            'title' => 'Tentang Kami',
            'conten' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa.',
            'position' => 'footer-about',
            'published' => '1',
            'lang' => 'id',
            'equal_id' => $arteqid
        ]);
        $footerabouten = Article::create([
            'title' => 'About Us',
            'conten' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa.',
            'position' => 'footer-about',
            'published' => '1',
            'lang' => 'en',
            'equal_id' => $arteqid
        ]);

        $arteqid = uniqid('ART', true);
        $footercontactid = Article::create([
            'title' => 'Hubungi Kami',
            'conten' => '<p class=" address"><i class="icon-map-pin"></i>198 West 21th Street Victoria 8007, Australia</p>
                <p class=" address"><i class="icon-phone"></i>(654) 332-112-222</p>
                <p class=" address"><i class="icon-mail"></i><a href="mailto:Edua@info.com">Edua@info.com</a></p>',
            'position' => 'footer-hubungikami',
            'published' => '1',
            'lang' => 'id',
            'equal_id' => $arteqid
        ]);
        $footercontacten = Article::create([
            'title' => 'Contact Us',
            'conten' => '<p class=" address"><i class="icon-map-pin"></i>198 West 21th Street Victoria 8007, Australia</p>
                <p class=" address"><i class="icon-phone"></i>(654) 332-112-222</p>
                <p class=" address"><i class="icon-mail"></i><a href="mailto:Edua@info.com">Edua@info.com</a></p>',
            'position' => 'footer-hubungikami',
            'published' => '1',
            'lang' => 'en',
            'equal_id' => $arteqid
        ]);

        $cfgfas = WebConfig::create([
            'config_name' => 'fasilitas_pagination',
            'value' => '5',
        ]);
    }
}
