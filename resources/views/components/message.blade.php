 @if (session()->has('message'))
     <div class="m-2">
         <p
             class="{{ (session('variant') == 'danger'
                     ? 'text-red-500'
                     : session('variant') == 'alert')
                 ? 'text-red-300'
                 : 'text-blue-400' }} font-semibold">
             {{ session('message') }}</p>
     </div>
     {{ session()->forget('message') }}
     {{ session()->forget('variant') }}
 @endif
