package pruebaRetrofitJava.Pedidos;

import pruebaRetrofitJava.Libro.LibroInterface;
import pruebaRetrofitJava.Pedidos.PedidoListCallback;
import pruebaRetrofitJava.VoidCallback;
import retrofit2.Retrofit;
import retrofit2.converter.gson.GsonConverterFactory;

public class Principalv2 {
	
	private final static String SERVER_URL = "https://putsreq.com/";

	public static void main(String[] args) {

		Retrofit retrofit;
		PedidoListCallback pedidoListCallback = new PedidoListCallback();
		VoidCallback voidCallback = new VoidCallback();
		
		retrofit = new Retrofit.Builder()
							   .baseUrl(SERVER_URL)
							   .addConverterFactory(GsonConverterFactory.create())
							   .build();
		
		PedidoInterface pedidoInter = retrofit.create(PedidoInterface.class);

		pedidoInter.getListaPedidos().enqueue(pedidoListCallback);

	}
}
