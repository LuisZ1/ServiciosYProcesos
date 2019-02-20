package ProductorConsumidor;

import java.util.Random;

public class Consumidor implements Runnable {

    private Signal miSignal;

    public Consumidor(Signal signal) {
        miSignal = signal;
    }

    @Override
    public void run() {
        System.out.println("consumidor corriendo");

        Random ran = new Random();
        int maxVal = 10, minVal = 0;
        int maxTemp = 1500, minTemp = 500;

        for (int j = 0; j < 100; j++) {

            int numeroSacado;
            long temp = (long) minTemp + ran.nextInt(maxTemp - minTemp + 1);


            if (Main.listaNumeritos.size() > 0) {
                numeroSacado = Main.listaNumeritos.get(0);
                Main.listaNumeritos.remove(0);
                System.out.println("\nConsumido (-" + numeroSacado + ")");

                for (int t : Main.listaNumeritos) {
                    System.out.print(t + ", ");
                }

                miSignal.doNotify();

                try {
                    Thread.sleep(temp);
                } catch (InterruptedException e) {
                    e.printStackTrace();
                }

            } else {
                j--;
                System.out.println("\nC - Wait");
                miSignal.doWait();
            }
        }
    }
}
