/*

[Color Switcher Script]

Project: BizLinks - Material Design Agency and Business Template
Version: 1.2
Author : themelooks.com

*/

(function ($) {
    "use strict"; // this function is executed in strict mode
    
    $(function () {
		var $openSwitcher = $('#open-switcher'),
			$closeSwitcher = $('#close-switcher'),
			$demoColors = $('#demo-colors'),
			$buttonColorsLI = $('#buttonColors li'),
			$mainColorsLI = $('#mainColors li'),
			$buttonColorScheme = $('#buttonColorScheme'),
			$mainColorScheme = $('#mainColorScheme');
		
		$openSwitcher.show();
		$closeSwitcher.show();
		$demoColors.show();
		
        $openSwitcher.on('click', function (){
            $openSwitcher.css("display", "none");
            $demoColors.animate({ 'left': '0px' }, 200, 'linear', function(){
                $closeSwitcher.fadeIn(200);
            });
        });

        $closeSwitcher.on('click', function (){
            $closeSwitcher.css("display", "none");
            $demoColors.animate({ 'left': '-202px' }, 200, 'linear', function(){
                $openSwitcher.fadeIn(200);
            });
        });

        $buttonColorsLI.on('click', function () {
            $buttonColorScheme.attr('href', $(this).attr('data-path'));
            $(this).addClass('active').siblings().removeClass('active');
        });

        $mainColorsLI.on('click', function () {
            $mainColorScheme.attr('href', $(this).attr('data-path'));
            $(this).addClass('active').siblings().removeClass('active');
        });
    });
})(jQuery);
