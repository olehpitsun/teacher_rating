<?php

class ManageTeachersModel extends Model {

    public function __construct() {
        parent::__construct ();
    }

    public function getAllTeachers() {
        $u = $this->db->select ( 'teachers', 'id,surname,name,fathername,post,degree,e-mail' );

        if ( $this->db->getCount () != 0 ) {
            $list = '<div class="table-responsive">';

            $list .= '<table class="table table-condensed table-bordered table-hover">';
            $list .= '<thead><tr class="caption">';

            $caption = array (
                '#',
                'Прізвище',
                'Ім\'я',
                'По батькові',
                'Посада',
                'Вчений ступінь',
                'Електронна пошта',              
                'Дії'
            );

            foreach ( $caption as $k => $v ) {
                $list .= '<th style="text-align: center">' . $v . '</th>';
            }

            $list .= '</tr></thead>';

            for ( $i = 0; $i < sizeof ( $u ); $i++ ) {
                if ( $u[$i]['id'] != SC::getCookie ( 'id' ) ) {
                    $list .= '<tr>';

                    foreach ( $u[$i] as $k => $v ) {
                        if ( $k != 'password' && $k != 'date' && $k != 'activateCode' && $k != 'hash' ) {
                            $list .= '<td>' . $v . '</td>';
                        }
                    }

                    $list .= '<td>';
                    $list .= '<a class="users-info-links" href="?c=manageTeachers&f=edit&p=' . $u[$i]['id'] . '">Редагувати</a><br />';
                    $list .= '<a class="users-info-links" href="?c=manageTeachers&f=delete&p=' . $u[$i]['id'] . '">Видалити</a>';
                    $list .= '</td>';

                    $list .= '</tr>';
                }
            }

            $list .= '</table>';
            $list .= '</div>';
        }

        return $list;
    }

    public function getOneUserInfo( $id,$_FILES ) {
        $res = $this->db->select ( 'teachers', '*', "id='$id'" );

        if ( $this->db->getCount () != 0 ) {
            return $res[0];
        } else {
            return 0;
        }
    }

    public function delete( $id ) {
        Statistics::add( 3, SC::getSession( 'id' ), $id );
        $this->db->delete ( 'teachers', "`id`='$id'" );
        header ( 'Location: ' . URL . '?c=manageTeachers&f=show' );
    }

    public function checkAdd( $data,$data_1 ) {

        $this->add_new_teachers ( $data,$data_1 );
    }

    public function checkEdit( $data,$data_1 ) {

            $this->edit_teachers ( $data,$data_1 );

    }

    private function add_new_teachers( $data,$data_1 ) {

        $data['surname'] = addslashes ( strip_tags ( trim ( $data['surname'], ' ' ) ) );
        $data['name'] = strip_tags ( trim ( $data['name'], ' ' ) );
        $data['fathername'] = strip_tags ( trim ( $data['fathername'], ' ' ) );
        $data['post'] = strip_tags ( trim ( $data['post'], ' ' ) );
        $data['degree'] = strip_tags ( trim ( $data['degree'], ' ' ) );
        $data['e-mail'] = strip_tags ( trim ( $data['e-mail'], ' ' ) );
        $data['res_interest'] =  $data['res_interest'] ;
        $data['articles'] =  $data['articles'] ;
        $data['birth_date'] =  $data['birth_date'] ;
        $data['scholar'] = $data['scholar'];


        if(is_uploaded_file($data_1["filename"]["tmp_name"]))
        {
            $r=rand(1, 200);
            $date=date("Ymdhs");
            $new_file_name=$r.$date;
            move_uploaded_file($data_1["filename"]["tmp_name"], "public/teachers/".$new_file_name.'.jpg');
            $img='public/teachers/'.$new_file_name.'.jpg';
            $data["img"]=$img;
        } else {
        }

        if ( $this->db->insert ( 'teachers', $data ) == 1 ) {

            $n_id = $this->db->lastInsertId ( 'teachers' );

            /*
             * Додавання запису в статистику
             */
            Statistics::add ( 1, SC::getSession( 'id' ), $n_id );

            header ( 'location: ' . URL . '?c=manageTeachers&f=show' );
        } else {
            header ( 'location: ' . URL . '?c=manageTeachers&f=error' );
        }
    }

    private function edit_teachers( $data,$data_1 ) {
        $id = $data['id'];
        unset ( $data['id'] );
        $data['surname'] = addslashes ( strip_tags ( trim ( $data['surname'], ' ' ) ) );
        $data['name'] = strip_tags ( trim ( $data['name'], ' ' ) );
        $data['fathername'] = strip_tags ( trim ( $data['fathername'], ' ' ) );
        $data['post'] = strip_tags ( trim ( $data['post'], ' ' ) );
        $data['degree'] = strip_tags ( trim ( $data['degree'], ' ' ) );
        $data['e-mail'] = strip_tags ( trim ( $data['e-mail'], ' ' ) );
        $data['birth_date'] =  $data['birth_date'] ;
        $data['scholar'] = $data['scholar'];

        if(is_uploaded_file($data_1["filename"]["tmp_name"]))
        {
            $r=rand(1, 200);
            $date=date("Ymdhs");
            $new_file_name=$r.$date;
            move_uploaded_file($data_1["filename"]["tmp_name"], "public/teachers/".$new_file_name.'.jpg');
            $img='public/teachers/'.$new_file_name.'.jpg';
            $data["img"]=$img;
            }
        else {
        }
        
        if ( $this->db->update ( 'teachers', $data, "id='$id'" ) ) {
            /*
             * Додавання запису в статистику
             */
            Statistics::add ( 2, SC::getSession ( 'id' ), $id );
        }
        header ( 'location: ' . URL . '?c=manageTeachers&f=show' );
    }
}

?>
