@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <div class="font-medium text-red-600">
            {{ __('Ops Você Digitou Algo errado') }}
        </div>
    </div>
@endif
