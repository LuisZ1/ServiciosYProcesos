package pruebaRetrofitJava.Libro;

import java.io.IOException;
import com.google.gson.Gson;
import okio.*;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;
import retrofit2.Retrofit;
import retrofit2.converter.gson.GsonConverterFactory;





/***************************************
 * SE PUEDEN DESCARGAR JARS DE CONVERTIDORES DE AQUÍ:
 * http://search.maven.org/
 * 
 * Por ejemplo:
 * http://search.maven.org/#search%7Cga%7C1%7Cg%3A%22com.squareup.retrofit2%22
 * 
 * Si usamos gradle, simplemente añadiríamos la dependencia:
 * com.squareup.retrofit2:converter-gson/home/migue/Descargas/converter-gson-2.1.0.jar
 *
 */

public class Principal {
	
	private final static String SERVER_URL = "https://putsreq.com/T8ocMqDahrFjtM5laNTB";

	public static void main(String[] args) {

//		Retrofit retrofit;
// 		LibroListCallback libroListCallBack = new LibroListCallBack();
//		PedidoListCallback pedidoListCallback = new PedidoListCallback();
//		VoidCallback voidCallback = new VoidCallback();
//
//		retrofit = new Retrofit.Builder()
//							   .baseUrl(SERVER_URL)
//							   .addConverterFactory(GsonConverterFactory.create())
//							   .build();
//
//		LibroInterface libroInter = retrofit.create(LibroInterface.class);
//
////		libroInter.getLibro(1).enqueue(libroCallback);
//
////		libroInter.getListaLibros().enqueue(libroListCallback);
//
//		Libro libro = new Libro (4,"Oscar Mola Mogollón","2356");
//
////		libroInter.postLibro(libro).enqueue(voidCallback);
//
//		libroInter.putLibro(libro).enqueue(voidCallback);

	}
}
