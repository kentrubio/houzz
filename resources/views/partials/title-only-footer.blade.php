<div class="text-center" style="border-top:1px solid #efefef;">
    <div>
        &copy; {{date('Y')}} {{Config::get('app.name')}}
    </div>
    <div>
    {!! Form::select('locale',['en'=>'English','ja'=>'日本語'], $locale, ['onchange'=>'document.location="/language/"+$(this).val();']) !!}
    </div>
</div>