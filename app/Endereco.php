<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model {

  /**
   * pois o eloquent adiciona o S automaticamente
   */
  //protected $table = 'links';

  /**
   * caso o campo se chamasse id nao precisaria desta linha
   */
  //protected $primaryKey = 'id';

  /**
   * indicar os campos que nao quero inserir pelo usuario e sim pela model
   */
  protected $guarded = array('id');

}