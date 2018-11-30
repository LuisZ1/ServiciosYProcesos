package pruebaRetrofitJava.Pedidos;

import pruebaRetrofitJava.Libro.Libro;
import retrofit2.Call;
import retrofit2.http.GET;

import java.util.List;

/**
 * Created by lzumarraga on 30/11/18.
 */
public interface PedidoInterface {

    @GET("/T8ocMqDahrFjtM5laNTB/")
    Call<List<Pedido>> getListaPedidos ();
}
