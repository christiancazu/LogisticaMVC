/*Función para validad formato de código de expediente de los formularios*/
$(document).ready(function() {
    $('.input-group .input-codigo').on('keyup change', function() {
		var $form = $(this).closest('form'),
            $group = $(this).closest('.input-group'),
			$addon = $group.find('.input-group-addon'),
			$icon = $addon.find('span'),
			state = false;
            
    	if (!$group.data('validate')) {
			state = $(this).val() ? true : false;
		}else if ($group.data('validate') == "dosdigitos") {
			state = /^[0-9]{2,2}$/.test($(this).val())
        }else if($group.data('validate') == 'uncaracter') {
			state = /^[a-zA-Z]{1,1}$/.test($(this).val())
		}else if($group.data('validate') == 'cuatrodigitos') {
			state = /^[0-9]{4,4}$/.test($(this).val())
		}else if($group.data('validate') == 'undigito') {
			state = /^[0-9]{1,1}$/.test($(this).val())
		}else if ($group.data('validate') == "length") {
			state = $(this).val().length == $group.data('length') ? true : false;
		}else if ($group.data('validate') == "number") {
			state = !isNaN(parseFloat($(this).val())) && isFinite($(this).val());
		}

		if (state) {
				$addon.removeClass('danger');
				$addon.addClass('success');				
		}else{
				$addon.removeClass('success');
				$addon.addClass('danger');				
		}
        
        if ($form.find('.input-group-addon.danger').length == 0) {
            $form.find('[type="submit"]').prop('disabled', false);
        }else{
            $form.find('[type="submit"]').prop('disabled', true);
        }
	});
    
    $('.input-group .input-codigo').trigger('change');
    
});