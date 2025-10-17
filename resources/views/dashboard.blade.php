<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
  const avatarContainer = document.getElementById('avatar-container');
  const avatarInput = document.getElementById('avatar-input');

  if (avatarContainer && avatarInput) {
    avatarContainer.addEventListener('click', () => {
      avatarInput.click();
    });

    avatarInput.addEventListener('change', () => {
      const file = avatarInput.files[0];
      if (file) {
        const imgPreview = avatarContainer.querySelector('img');
        if (imgPreview) {
          imgPreview.src = URL.createObjectURL(file);
        }

        // Gửi form tự động
        const form = document.getElementById('avatar-form');
        if (form) {
          form.submit();
        }
      }
    });
  }
});
</script>
@endpush
