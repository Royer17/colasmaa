<?php

namespace App\Utils;

use Image;
use League\Flysystem\Filesystem;
use Spatie\Dropbox\Client;
use Spatie\FlysystemDropbox\DropboxAdapter as Adapter;
use stdClass;

class Helpers
{
    public static function subir_cortar($img, $w, $h, $x, $y, $destino, $resolucion, $resolucion_thumb,$ext='png')
    {
        $imagen_recortada = new stdClass;

        $app_name = 'rccTacna';
        $dropbox_token = 'g3IrobgPl1IAAAAAAAAAARBQS3ZEznYvj33YFSY4IFVa2ph6H4U5Ji4hEWyJK9R4';
        $dropbox_client = new Client($dropbox_token);

        $dropbox_imagen = new Filesystem(new Adapter($dropbox_client, '/'.$destino.'/image/'));
        $dropbox_imagen_thumb = new Filesystem(new Adapter($dropbox_client, '/'.$destino.'/image_thumb/'));

        if (is_string($img)) {
            $imagen_normal = Image::make($img);
            $imagen_thumb = Image::make($img);
        } else {
            $imagen_normal = Image::make($img->getRealPath());
            $imagen_thumb = Image::make($img->getRealPath());
        }

        if ( $w != "no" ) {
            $imagen_normal->crop(intval($w), intval($h), intval($x), intval($y));
            $imagen_thumb->crop(intval($w), intval($h), intval($x), intval($y));
        }

        if (is_null($resolucion) ) {
            $imagen_normal->encode($ext, 50);
        } else {
            $imagen_normal->widen($resolucion);
            $imagen_normal->encode($ext, 50);
        }

        if (is_null($resolucion_thumb) ) {

            if (is_string($img)) {
                $imagen_normal_name = time()."-".time().".jpg";
            } else {
                $imagen_normal_name = time()."-".$img->getClientOriginalName();
            }

            $imagen_normal_path = '/'.$destino.'/image/'.$imagen_normal_name;

            $dropbox_imagen->put($imagen_normal_name, (string) $imagen_normal);
            $imagen_normal_url = $dropbox_client->createSharedLinkWithSettings($imagen_normal_path, ["requested_visibility" => "public"]);
            //dd($imagen_normal_url);

            $valor_a_buscar = "www.dropbox.com";
            $valor_de_reemplazo = "dl.dropboxusercontent.com";
            $new_imagen_normal_url = str_replace( $valor_a_buscar , $valor_de_reemplazo , $imagen_normal_url['url']);

            $imagen_recortada->normal_url = $new_imagen_normal_url;
            $imagen_recortada->normal_path = $imagen_normal_path;
        }
        else
        {
            $imagen_thumb->widen($resolucion_thumb);
            $imagen_thumb->encode('jpg');
            
            if (is_string($img)) {
                $imagen_normal_name = time()."-".time().".".$ext;
                $imagen_thumb_name = time()."-thumb-".time().".".$ext;
            } else {
              $imagen_normal_name = time()."-".$img->getClientOriginalName();
              $imagen_thumb_name = time()."-thumb-".$img->getClientOriginalName();
            }

            $imagen_normal_path = '/'.$destino.'/image/'.$imagen_normal_name;
            $imagen_thumb_path = '/'.$destino.'/image_thumb/'.$imagen_thumb_name;

            $dropbox_imagen->put($imagen_normal_name, (string) $imagen_normal);
            $imagen_normal_url = $dropbox_client->createSharedLinkWithSettings($imagen_normal_path, ["requested_visibility" => "public"]);
            //dd($imagen_normal_url);

            $dropbox_imagen_thumb->put($imagen_thumb_name, (string) $imagen_thumb);
            $imagen_thumb_url = $dropbox_client->createSharedLinkWithSettings($imagen_thumb_path, ["requested_visibility" => "public"]);

            $valor_a_buscar = "www.dropbox.com";
            $valor_de_reemplazo = "dl.dropboxusercontent.com";
            $new_imagen_normal_url = str_replace( $valor_a_buscar , $valor_de_reemplazo , $imagen_normal_url['url']);
            $new_imagen_thumb_url = str_replace( $valor_a_buscar , $valor_de_reemplazo , $imagen_thumb_url['url']);

            $imagen_recortada->normal_url = $new_imagen_normal_url;
            $imagen_recortada->normal_path = $imagen_normal_path;
            $imagen_recortada->thumb_url = $new_imagen_thumb_url;
            $imagen_recortada->thumb_path = $imagen_thumb_path;
        }

        return $imagen_recortada;
    }

    public static function borrar_imagen($ruta, $url)
    {
        $app_name = 'rccTacna';
        $dropbox_token = 'g3IrobgPl1IAAAAAAAAAARBQS3ZEznYvj33YFSY4IFVa2ph6H4U5Ji4hEWyJK9R4';
        $dropbox_client = new Client($dropbox_token);

        if (! empty($url)) {
            if (! is_null($url)) {
                $ok = get_headers($url);

                if ($ok[0] == 'HTTP/1.0 200 OK') {
                        $dropbox_client->delete($ruta);
                }
            }
        }
    }

	//pdf
	public static function subir_pdf($img, $destino)
	{
		$imagen_recortada = new stdClass;

		$app_name = 'rccTacna';
		$dropbox_token = 'g3IrobgPl1IAAAAAAAAAARBQS3ZEznYvj33YFSY4IFVa2ph6H4U5Ji4hEWyJK9R4';
		$dropbox_client = new Client($dropbox_token);

		$dropbox_imagen = new Filesystem(new Adapter($dropbox_client, '/'.$destino.'/pdf/'));

			$nombre = $img->getClientOriginalName();
			$img = file_get_contents($img->getRealPath());

			if (is_string($img)) {
				$imagen_normal_name = time()."-".$nombre;
			} else {
				$imagen_normal_name = time()."-".$nombre;
			}

			$imagen_normal_path = '/'.$destino.'/pdf/'.$imagen_normal_name;

			$dropbox_imagen->put($imagen_normal_name, (string) $img);
			$imagen_normal_url = $dropbox_client->createSharedLinkWithSettings($imagen_normal_path, ["requested_visibility" => "public"]);

			$valor_a_buscar = "www.dropbox.com";
			$valor_de_reemplazo = "dl.dropboxusercontent.com";
			$new_imagen_normal_url = str_replace( $valor_a_buscar , $valor_de_reemplazo, $imagen_normal_url['url']);

			$imagen_recortada->normal_url = $new_imagen_normal_url;
			$imagen_recortada->normal_path = $imagen_normal_path;

		return $imagen_recortada;
	}

	public static function borrar_pdf($ruta, $url)
	{
		$app_name = 'rccTacna';
		$dropbox_token = 'g3IrobgPl1IAAAAAAAAAARBQS3ZEznYvj33YFSY4IFVa2ph6H4U5Ji4hEWyJK9R4';
		$dropbox_client = new Client($dropbox_token);

		if (! empty($url)) {
			if (! is_null($url)) {
				$ok = get_headers($url);
				if ($ok[0] == 'HTTP/1.1 200 OK') 				{
					$dropbox_client->delete($ruta);
				}
			}
		}
	}

}
