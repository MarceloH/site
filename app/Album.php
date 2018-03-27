<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model {

  /**
   * pois o eloquent adiciona o S automaticamente
   */
  protected $table = 'albuns';

  /**
   * caso o campo se chamasse id nao precisaria desta linha
   */
  //protected $primaryKey = 'id';

  /**
   * indicar os campos que nao quero inserir pelo usuario e sim pela model
   */
  protected $guarded = array('id');

  /**
   * Definindo relacionamento One To Many
   */
  public function foto()
    {
        return $this->hasMany('App\Foto','id_album');
    }

}