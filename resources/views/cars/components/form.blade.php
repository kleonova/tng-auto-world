<div class="mb-3">
    <x-form-select name="brand_id" :options="$brands" label="Brand" placeholder="Choose brand..." />
</div>

<div class="mb-3">
    <x-form-input name="model" label="Model" placeholder="Enter model..." />
</div>

<div class="mb-3">
    <x-form-input name="vin" label="Vin" placeholder="Enter vin..." />
</div>

<div class="mb-3">
    <x-form-input name="price" label="Price" placeholder="Enter price..." />
</div>

<div class="mb-3">
    <x-form-input name="created_year" label="Year" placeholder="Enter year, 1993" />
</div>

<div class="mb-3">
    <x-form-select name="transmission" :options="$transmissions" label="Transmission" placeholder="Choose transmission..." />
</div>

<div class="mb-3">
    <x-form-select name="tags[]" :options="$tags" label="Tags" placeholder="Choose tag..." multiple :default="isset($defaultTags) ? $defaultTags : []" />
</div>