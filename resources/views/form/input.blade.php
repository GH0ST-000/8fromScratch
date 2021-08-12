<div class="mb-6">
    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"  for="title">Title</label>
    <input class="border border-gray-400 p-2 w-full" type="text" value="{{ old('title') }}" name="title" id="title" required>
    @error('title')
    <p class="text-red-500 text-xs mt-2">{{ $messsage }}</p>
    @enderror
</div>
