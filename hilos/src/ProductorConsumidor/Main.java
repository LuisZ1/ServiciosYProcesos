package ProductorConsumidor;

import java.util.ArrayList;

public class Main {

    public static int numerito = 0;
    public static ArrayList<Integer> listaNumeritos = new ArrayList<>();

    public static void main(String[] args) {
        System.out.println("Hello World!");

        Signal signalMolona = new Signal();

        Runnable consumidor = new Consumidor(signalMolona);
        Runnable productor = new Productor(signalMolona);

        Thread hiloConsumidor = new Thread(consumidor, "consumidor");
        Thread hiloProductor = new Thread(productor, "productor");

        hiloProductor.start();
        hiloConsumidor.start();

    }
}
