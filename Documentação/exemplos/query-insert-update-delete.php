<?php
// Insere
$modelo->db->insert(
	'tabela', 
	
	// Insere uma linha
	array('campo_tabela' => 'valor', 'outro_campo'  => 'outro_valor'),
	
	// Insere outra linha
	array('campo_tabela' => 'valor', 'outro_campo'  => 'outro_valor'),
	
	// Insere outra linha
	array('campo_tabela' => 'valor', 'outro_campo'  => 'outro_valor')
);
 
// Atualiza
$modelo->db->update(
	'tabela', 'campo_where', 'valor_where',
	
	// Atualiza a linha
	array('campo_tabela' => 'valor', 'outro_campo'  => 'outro_valor')
);
 
// Apaga
$modelo->db->delete(
	'tabela', 'campo_where', 'valor_where'
);
 
// Seleciona
$modelo->db->query(
	'SELECT * FROM tabela WHERE campo = ? AND outro_campo = ?',
	array( 'valor', 'valor' )
);