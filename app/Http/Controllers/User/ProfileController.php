<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserInfo;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * User Profile
     * @param Nill
     * @return View Profile
     * @author Shani Singh
     */
    public function getProfile()
    {
        return view('users.profile.index');
    }

    /**
     * Update Profile
     * @param $profileData
     * @return Boolean With Success Message
     * @author Shani Singh
     */
    public function updateProfile(Request $request)
    {
        // return $request->all();
        #Validations
        $request->validate([
            'first_name'    => 'required',
            'last_name'     => 'required',
            'mobile_number' => 'required|numeric|digits:11',
        ]);
        try{
            $user = User::with('user_info')->find(auth()->user()->id);
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->mobile_number = $request->mobile_number;
            $user->save();
            if($user->user_info != null){
                $userInfo =  UserInfo::find($user->user_info->id);
            }else{
                $userInfo = new UserInfo();
                $userInfo->user_id = $user->id;
            }
            if($request->profile_image_baseImage != null){
                if($userInfo->profile_image != null){
                    @unlink($userInfo->profile_image);
                }
                $baseProfileImage = $request->profile_image_baseImage;
                $base64_str_profile = substr($baseProfileImage, strpos($baseProfileImage, ",") + 1);
                $imageProfile = base64_decode($base64_str_profile);
                $profile_image_name   = $user->id . "-" . time() . ".png";
                $locationProfile   = 'uploads/user/';
                if (!file_exists($locationProfile)) {
                    mkdir('uploads/user/');
                }
                Image::make($imageProfile)->save($locationProfile . $profile_image_name);
                $userInfo->profile_image = $locationProfile . $profile_image_name;
            }
            $vcStatus = "without vodcaster";
            if($request->youtube_id != null && $request->description != null){
                $userInfo->youtube_id = $request->youtube_id;
                if($request->vodcaster_image_baseImage != null){
                    if($userInfo->vodcaster_image_baseImage != null){
                        @unlink($userInfo->vodcaster_image_baseImage);
                    }
                    $baseVodcasterImage = $request->vodcaster_image_baseImage;
                    $base64_str_vodcaster = substr($baseVodcasterImage, strpos($baseVodcasterImage, ",") + 1);
                    $imageVodcaster = base64_decode($base64_str_vodcaster);
                    $vodcaster_image_name   = $user->id . "-" . time() . ".png";
                    $locationVodcaster   = 'uploads/user/';
                    if (!file_exists($locationVodcaster)) {
                        mkdir('uploads/user/');
                    }
                    Image::make($imageVodcaster)->save($locationVodcaster . $vodcaster_image_name);
                    $userInfo->vodcaster_image = $locationVodcaster . $vodcaster_image_name;
                }
                $userInfo->description = $request->description;

                $vcStatus = "with vodcaster";
            }
            $userInfo->save();

            return redirect()->back()->with('success', 'Profile Updated Successfully ( '.$vcStatus.' ).');

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Change Password
     * @param Old Password, New Password, Confirm New Password
     * @return Boolean With Success Message
     * @author Shani Singh
     */
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        try {
            DB::beginTransaction();

            #Update Password
            User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

            #Commit Transaction
            DB::commit();

            #Return To Profile page with success
            return back()->with('success', 'Password Changed Successfully.');

        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }
}
