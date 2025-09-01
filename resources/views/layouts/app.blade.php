@props(['title' => ''])

<x-base-layout :$title bodyClass='something'>
    <x-layouts.header />
    {{ $slot }}
</x-base-layout>
