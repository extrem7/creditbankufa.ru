<form role="search" method="get" class="search-form search" action="<?php echo home_url( '/' ); ?>">
    <div class="input">
        <input type="search" placeholder="Например: кредит" value="<?php echo get_search_query() ?>" name="s"
               title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>">
        <button type="submit" class="button">Поиск</button>
    </div>
</form>