<?php

    namespace App\Helpers;

    use Illuminate\Support\Str;

    class Helper{
        public static function menu($menus, $parent_id  = 0, $char = ''){
            $html = '';

            // đệ quy
            foreach ($menus as $key => $menu) {
                if($menu->parent_id == $parent_id){

                    $html .= '<tr>
                                    <td>'.$menu->id .'</td>
                                    <td>'. $char . $menu->name .'</td>
                                    <td>'. self::active($menu->active) .'</td>
                                    <td>'. $menu->updated_at .'</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="/admin/menus/edit/'. $menu->id .'">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger btn-sm" onclick = "removeRow('.$menu->id.', \'/admin/menus/destroy\')">
                                            <i class="fa-solid fa-trash-can "></i>
                                        </a>
                                    </td>
                                </tr>';

                                unset($menus[$key]);

                                $html .= self::menu($menus, $menu->id, $char .'--');
                }


            }

            return $html;
        }

        public static function active($active = 0){

            return $active == 0 ? '<span class= "btn btn-danger btn-xs">No</span>':'<span class= "btn btn-success btn-xs">YES</span>';

        }

        public static function menus($menus, $parent_id = 0,$class = 'nav-link text-white' ){
            $html = '';
            foreach ($menus as $key => $menu) {
                if($menu->parent_id == $parent_id){
                    $html .='   <li class="nav-item dropdown">
                                    <a class="'.$class.'" href="/shop/'.$menu->id.'-'.$slug = Str::slug($menu->name, '-').'.html" >
                                        '.$menu->name.'
                                    </a>';

                                    unset($menus[$key]);

                                    if(self::ischild($menus, $menu->id)){
                                        $html.='<ul class="dropdown-menu px-2">
                                                    <div class="dropdown-menu-item">';
                                        $html.= self::menus($menus,$menu->id, 'dropdown-item');
                                        $html.='    </div>
                                                </ul>';
                                    }
                                '</li>';
                }

            }

            return $html;
        }

        public static function ischild($menus, $id){
            foreach ($menus as $menu) {
                if($menu->parent_id == $id){
                    return true;
                }
            }
            return false;
        }

        public static function slider_banner(){

        }
    }
