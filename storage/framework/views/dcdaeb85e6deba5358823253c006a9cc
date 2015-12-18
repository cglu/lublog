<?php  use Illuminate\Support\Facades\DB;?>
   <div class="sidebar-module">
            <h4>分类</h4>
            <ol class="list-unstyled">
              <?php
             
              $sql="select COUNT(*) as 'count',categories.`name`,categories.id from categories 
            left JOIN articles on articles.category_id=categories.id
            where articles.title is not null and articles.title!=''
            GROUP BY categories.id,categories.`name` ;";
      $results = DB::select($sql);
              foreach ($results as $record){
                 echo  "<li><a href=\"".url("/search/categories?id={$record->id}")."\">{$record->name}({$record->count})</a></li>";
                  
              }
      ?>
            </ol>
          </div>