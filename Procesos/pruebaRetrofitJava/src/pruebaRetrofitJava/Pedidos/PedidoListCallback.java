package pruebaRetrofitJava.Pedidos;

import okhttp3.Headers;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

import java.util.ArrayList;
import java.util.List;

/**
 * Created by lzumarraga on 30/11/18.
 */
public class PedidoListCallback implements Callback<List<Pedido>> {

    @Override
    public void onFailure(Call<List<Pedido>> arg0, Throwable arg1) {
        System.out.println("ERROR");
    }

    @Override
    public void onResponse(Call<List<Pedido>> arg0, Response<List<Pedido>> resp) {

        ArrayList<Pedido> lista;
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

        for(Pedido pedido : lista){
            System.out.println(pedido.getId() /*+ " " + pedido.getProductos().toString() */);
        }
    }
}
