<!DOCTYPE html>
<html>
     <head>
     <meta charset="UTF-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1" />
     <script type="text/javascript">
     $('.able').bind('tap', function () {
    	    alert('Expanded');
    	});
</script>
</head>
<body>
    <div data-role="page">
        <header data-role="header">
            <h1>list</h1>
        </header>
        <div data-role="content">
        <?php 
        foreach ($list as $elem)
        {
        	echo '<div data-role="collapsible" data-collapsed="true">';
        	echo sprintf('<h3 class="able">%s:%s</h3>',$elem['no'],$elem['name']);        	
        	echo '<p class="able">';
        	echo sprintf('H:%s A:%s B:%s C:%s D:%s S:%s',
								$elem['H'],$elem['A'],$elem['B'],$elem['C'],$elem['D'],$elem['S']);        	
        	echo '</p>';
        	echo '</div>';
        }
        ?>
        </div>
        <footer data-role="footer">
            <h1></h1>
        </footer>
    </div>
</body>
</html>