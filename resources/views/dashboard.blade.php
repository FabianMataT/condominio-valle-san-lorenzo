<x-layouts.app :title="__('Dashboard')">
    <livewire:pages.admins.home />
</x-layouts.app>


{{-- <x-layouts.app :title="__('Dashboard')">
    <div>
    <x-mary-header title="{{ __('Register New Contact') }}"
        subtitle="{{ __('Fill out the information to create a new customer or lead') }}" separator>

        <x-slot:actions>
            <x-mary-button label="{{ __('Go back') }}" icon="o-arrow-left" link="/admin/customers" responsive />
        </x-slot:actions>

    </x-mary-header>

    <x-mary-form wire:submit="saveContact">
        @csrf
        <x-mary-errors title="{{ __('Uh-oh!') }}" description="{{ __('There are some issues to resolve.') }}"
            icon="o-exclamation-triangle" class="bg-red-100 text-red-800 border border-red-300 rounded-md p-4" />


        <div class="grid md:grid-cols-2 gap-6">
            <x-mary-card class="mb-6" shadow title="{{ __('Contact type') }}" separator class="border border-base-content/10 bg-base-100/30 shadow-md"
                subtitle="{{ __('Select the appropriate type for this contact') }}">
                @php
                    $type = [
                        ['id' => 'customer', 'name' => __('Customer with access')],
                        ['id' => 'internal', 'name' => __('Customer without access')],
                        ['id' => 'lead', 'name' => __('Only a lead')],
                    ];
                @endphp
                <x-mary-radio label="{{ __('Contact type') }}" wire:model.live="contactType" :options="$type" />
            </x-mary-card>

            <x-mary-card class="mb-6" shadow title="{{ __('General Information') }}" separator
                subtitle="{{ __('Basic details for all contacts') }}">
                <div class="grid lg:grid-cols-2 gap-6">
                    <x-mary-input label="{{ __('First Name') }}" wire:model="name" />
                    <x-mary-input label="{{ __('Phone Number') }}" wire:model="phone" />
                </div>
            </x-mary-card>

        </div>

        <x-mary-card class="mb-6" shadow title="{{ __('Additional Contact Details') }}" separator
            subtitle="{{ __('Optional but useful information for client relationship') }}">
            <div class="grid lg:grid-cols-2 gap-6">
                <x-mary-input label="{{ __('Position or Role') }}" wire:model="position" />
                <x-mary-input label="{{ __('Company') }}" wire:model="company" />
                <x-mary-input label="{{ __('Country') }}" wire:model="country" />
                <x-mary-input label="{{ __('City') }}" wire:model="city" />
                <x-mary-input label="{{ __('Preferred Contact Method') }}" wire:model="preferred_contact_method" />
                <x-mary-input label="{{ __('WhatsApp') }}" wire:model="whatsapp" />
                <div class="col-span-full">
                    <x-mary-textarea label="{{ __('Additional Notes') }}" wire:model="contact_details"
                        placeholder="{{ __('E.g. Prefers morning calls, met at event X...') }}" rows="3" />
                </div>
            </div>
        </x-mary-card>

            <x-mary-card shadow title="{{ __('Access Credentials') }}" separator
                subtitle="{{ __('Used to access the system') }}">
                <div class="grid lg:grid-cols-2 gap-6">
                    <x-mary-input label="{{ __('Email Address') }}" type="email" wire:model="email" />
                    <x-mary-password label="{{ __('Password') }}" type="password" wire:model="password" />
                </div>
            </x-mary-card>

        <x-slot:actions>
            <div class="flex justify-end gap-4">
                <x-mary-button icon="o-arrow-up-tray" label="{{ __('Save') }}" type="submit" spinner="saveContact" class="btn-primary" />
            </div>
        </x-slot:actions>
    </x-mary-form>
</div>

</x-layouts.app> --}}
