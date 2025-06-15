<div>


    <form method="POST" action="{{ route('language.switch') }}">

        @csrf

        <select name="locale" onchange="this.form.submit()">


            @foreach(['az' => 'AZ', 'en' => 'EN'] as $code => $lang)

                <option value="{{ $code }}" {{ app()->getLocale() === $code ? 'selected' : '' }}>{{ $lang }}</option>
                
            @endforeach


        </select>

    </form>


</div>
