<div>
    <textarea name="body"
              class="{{ $textareaClass }} resize-none w-full @if($limit) text-red-600 @endif"
              placeholder="{{ $placeholder }}"
              required
              wire:model="string"
    ></textarea>
    <span class="float-right text-gray-400 text-sm @if($limit) text-red-600 @endif">{{ $characters }} / 255</span>
</div>
