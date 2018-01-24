<?php

namespace App\Providers;

use Faker\Provider\Image;
use Illuminate\Support\ServiceProvider;
use Validator;
use App\Models\Contry;
use App\Models\City;
use App\Models\Category;
use App\Models\PackageDescription ;
use App\Models\Advertisment ;
use App\Models\About ;
use App\Models\SocialMedia ;
use App\Models\GeneralSetting ;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Validator::extend('greater_than_field', function($attribute, $value, $parameters, $validator) {
            $min_field = $parameters[0];
            $data = $validator->getData();
            $min_value = $data[$min_field];
            return $value > $min_value;
        });

        Validator::replacer('greater_than_field', function($message, $attribute, $rule, $parameters) {
            return str_replace([':field',':attribute'], [$parameters[0],$attribute], $message);
        });
        $advertisement1 = Advertisment::where(['position'=>'first'])->first();
        $advertisement2 = Advertisment::where(['position'=>'second'])->first();
        $advertisement3 = Advertisment::where(['position'=>'third'])->first();
        $countries = Contry::all();
        $cities = City::all();
        $categories = Category::where('status','=','1')->get();
        $destination = PackageDescription::pluck('destination');
        $package_name = PackageDescription::pluck('name');
        $aboutUs = About::find(1);
        $general_settings = GeneralSetting::find(1);
        $socialMedia = SocialMedia::where('is_active','=',1)->get();
        view()->share([
            'countries'=>$countries , 'cities'=>$cities ,
            'categories' => $categories ,'package_name' => $package_name,
            'package_destination' => $destination,
            'advertise1' => $advertisement1,
            'advertise2' => $advertisement2,
            'advertise3' => $advertisement3,
            'about_us' => $aboutUs,
            'social_media' => $socialMedia,
            'general_settings' => $general_settings
         ]);

         
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
