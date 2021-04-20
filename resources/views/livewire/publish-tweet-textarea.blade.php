<div>
    <textarea name="body"
              class="w-full @if($limit) text-red-600 @endif"
              placeholder="What`s happening?"
              required
              wire:model="string"
    ></textarea>
    <span class="float-right @if($limit) text-red-600 @endif">{{ $characters }} / 255</span>
</div>
