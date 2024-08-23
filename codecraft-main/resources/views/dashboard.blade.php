<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @if (Auth::user()->verification == "false" && Auth::user()->usertype == "student")
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3>Welcome {{ Auth::user()->firstname }}! Before you begin, please answer the following:</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{route('newstudent')}}">
                        @csrf
                        <div class="mb-5">
                            <h4 class="mb-3">Programming Expertise</h4>
                            <div class="btn-group-toggle d-flex flex-wrap justify-content-start" data-toggle="buttons">
                                <label class="btn btn-outline-primary m-2">
                                    <input type="radio" name="expertise" id="beginner" value="beginner" required> Beginner
                                </label>
                                <label class="btn btn-outline-primary m-2">
                                    <input type="radio" name="expertise" id="intermediate" value="intermediate" required> Intermediate
                                </label>
                                <label class="btn btn-outline-primary m-2">
                                    <input type="radio" name="expertise" id="expert" value="expert" required> Expert
                                </label>
                            </div>
                            @error('expertise')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="mb-5">
                            <h4 class="mb-3">Specialty</h4>
                            <div class="btn-group-toggle d-flex flex-wrap justify-content-start" data-toggle="buttons">
                                <label class="btn btn-outline-primary m-2">
                                    <input type="checkbox" name="specialty[]" id="frontend" value="frontend"> Frontend
                                </label>
                                <label class="btn btn-outline-primary m-2">
                                    <input type="checkbox" name="specialty[]" id="backend" value="backend"> Backend
                                </label>
                                <label class="btn btn-outline-primary m-2">
                                    <input type="checkbox" name="specialty[]" id="fullstack" value="fullstack"> Fullstack
                                </label>
                                <label class="btn btn-outline-primary m-2">
                                    <input type="checkbox" name="specialty[]" id="android" value="android"> Android Development
                                </label>
                                <label class="btn btn-outline-primary m-2">
                                    <input type="checkbox" name="specialty[]" id="android" value="application"> Application Development
                                </label>
                                <label class="btn btn-outline-primary m-2">
                                    <input type="checkbox" name="specialty[]" id="android" value="hardware"> Hardware
                                </label>
                            </div>
                            @error('specialty')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    @elseif(Auth::user()->verification == "true" && Auth::user()->usertype == "student")
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Hi ") }}{{ Auth::user()->firstname }}{{ __(" ! Welcome to your Dashboard") }}
                </div>
            </div>
        </div>
    </div>

    @elseif(Auth::user()->verification == "unverified" && Auth::user()->usertype == "teacher")
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Hi teacher ") }}{{ Auth::user()->firstname }}{{ __(" ! You are not currently verified, Please wait for the admin for review of your License/ID") }}
                </div>
            </div>
        </div>
    </div>

    @elseif(Auth::user()->verification == "verified" && Auth::user()->usertype == "teacher")
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Hi teacher ") }}{{ Auth::user()->firstname }}{{ __(" ! Welcome to your Dashboard.") }}
                </div>
            </div>
        </div>
    </div>

    @elseif(Auth::user()->verification == "rejected" && Auth::user()->usertype == "teacher")
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Hi teacher ") }}{{ Auth::user()->firstname }}{{ __(" ! Looks like admin doesnt approve your Licence/ID. If you wish to delete your account, Just go to profile and press the delete button.") }}
                </div>
            </div>
        </div>
    </div>

    @else
        
    @endif
</x-app-layout>
