package pruebaRetrofitJava.Libro;

import okhttp3.Headers;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

import java.util.ArrayList;
import java.util.List;


public class LibroListCallback implements Callback<List<Libro>> {

    @Override
    public void onFailure(Call<List<Libro>> arg0, Throwable arg1) {
        System.out.println("ERRORRRRR");
    }

    @Override
    public void onResponse(Call<List<Libro>> arg0, Response<List<Libro>> resp) {


        ArrayList<Libro> lista;
        String contentType;
        int code;
        String message;
        boolean isSuccesful;

        lista = new ArrayList<>(resp.body());

        Headers cabeceras = resp.headers();
        contentType = cabeceras.get("Content-Type");
        code = resp.code();
        message = resp.message();
        isSuccesful = resp.isSuccessful();

        for(Libro libro : lista){
            System.out.println(libro.getCodigo() + " " + libro.getTitulo() + " " + libro.getNumpag());
        }
    }


}
