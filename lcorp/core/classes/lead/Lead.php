<?php
    namespace wcms\classes\lead;

    use wcms\classes\model\Model;
    use Jajo\JSONDB;

    class Lead extends Model{
        protected $table = 'leads.json';
        protected $fillable = ['id', 'created_at', 'name', 'email', 'phone', 'city', 'cost', 'mailed'];
        protected $default = ['mailed' => 0];
    };
?>