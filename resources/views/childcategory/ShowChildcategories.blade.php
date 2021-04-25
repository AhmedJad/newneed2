{{-- <thead>
    <tr
        class="text-xs font-semibold tracking-wide 
        text-left text-gray-500 uppercase border-b 
        dark:border-gray-700 bg-gray-50 dark:text-gray-400 
        dark:bg-gray-800 "
    >
        <th class="px-4 py-3">Name</th>
        <th class="px-4 py-3">Description</th>
        <th class="px-4 py-3">Created Date</th>
        <th class="px-4 py-3">Updated Date</th>
    </tr>
</thead> --}}
<tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
  <tr class="text-gray-700 dark:text-gray-400">
    @foreach ($subcategories as $subcategory)
  
       
        <div>
        number: {{$subcategory->id}}
        </div>
         <div>
         name:   {{$subcategory->Categories->name}}
         </div>
         <div>
           desc: {{$subcategory->description}}
         </div>
         <div>
          created:  {{$subcategory->created_at}}
        </div>
          updated: {{$subcategory->updated_at}} 
         </div>
        
      
      @endforeach