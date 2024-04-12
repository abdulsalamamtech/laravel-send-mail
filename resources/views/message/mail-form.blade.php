
@extends('layouts.message')


@section('content')
<section class="bg-gray-100 w-full p-6">
    <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 gap-x-16 gap-y-8 lg:grid-cols-5">
        <div class="lg:col-span-2 lg:py-12">
            <h2 class="text-3xl text-bold py-2 mb-4 font-medium text-black-900">
             Send Message To Your Love Once!
             </h2>
          <p class="max-w-xl text-lg">
            {!! Illuminate\Foundation\Inspiring::quote() !!}
          </p>

          <div class="mt-8">
            <a href="#" class="text-2xl font-bold text-pink-600"> +23490 9192 2467</a>

            <address class="mt-2 not-italic">Kano State, Nigeria</address>
          </div>
        </div>

        <div class="rounded-lg bg-white p-8 shadow-lg lg:col-span-3 lg:p-12">



          <form action="{{ route('send-mail') }}" class="space-y-4">

            {{-- <div>
              <label class="sr-only" for="name">Your Name</label>
              <input
                class="w-full rounded-lg border border-gray-200 p-3 text-sm"
                placeholder="Name"
                name="name"
                type="text"
                id="name"
              />
            </div> --}}

            <div>
              <label class="sr-only" for="email">Email</label>
              <input
                class="w-full rounded-lg border border-{{ $errors->first('email')? 'red-300' : 'gray-200' }} p-3 text-sm"
                placeholder="Email address"
                name="email"
                value="{{ old('email') }}"
                type="email"
                id="email"
              />
              @error('email')
                <br>
                <span class="text-red-400">{{ $message }}</span>
              @enderror
            </div>

            <div>
              <label class="sr-only" for="subject">Subject</label>
              <input
                class="w-full rounded-lg border border-{{ $errors->first('email')? 'red-300' : 'gray-200' }} p-3 text-sm"
                placeholder="Subject"
                name="subject"
                value="{{ old('subject') }}"
                type="text"
                id="subject"
              />
              @error('subject')
                <br>
                <span class="text-red-400">{{ $message }}</span>
              @enderror
            </div>

            {{-- <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
              <div>
                <label class="sr-only" for="email">Email</label>
                <input
                  class="w-full rounded-lg border border-gray-200 p-3 text-sm"
                  placeholder="Email address"
                  name="email"
                  type="email"
                  id="email"
                />
              </div>

              <div>
                <label class="sr-only" for="subject">Subject</label>
                <input
                  class="w-full rounded-lg border border-gray-200 p-3 text-sm"
                  placeholder="Subject"
                  name="subject"
                  type="text"
                  id="subject"
                />
              </div>
            </div> --}}


            <div>
              <label class="sr-only" for="message">Message</label>

              <textarea
                class="w-full rounded-lg border border-{{ $errors->first('email')? 'red-300' : 'gray-200' }} p-3 text-sm"
                placeholder="Message"
                name="message"
                rows="8"
                id="message"
              >{{ old('message') }}</textarea>
              @error('message')
                <br>
                <span class="text-red-400">{{ $message }}</span>
              @enderror
            </div>

            <div class="mt-4">
              <button
                type="submit"
                class="inline-block w-full rounded-lg bg-black px-5 py-3 font-medium text-white sm:w-auto"
              >
                Send
              </button>
            </div>
          </form>


        </div>
      </div>
    </div>
  </section>


  @endsection