package ProductorConsumidor;

import java.util.Random;

public class Productor implements Runnable {

    private Signal miSignal;

    public Productor(Signal signal) {
        miSignal = signal;
    }

    @Override
    public void run() {
        System.out.println("ProductorConsumidor.Productor corriendo");

        Random ran = new Random();
        int maxVal = 10, minVal = 0;
        int maxTemp = 1000, minTemp = 500;

        for (int i = 0; i < 100; i++) {

            long temp = (long) minTemp + ran.nextInt(maxTemp - minTemp + 1);
            int num = minVal + ran.nextInt(maxVal - minVal + 1);

            if (Main.listaNumeritos.size() < 10) {
                Main.listaNumeritos.add(num);
                System.out.println("\nProducido (+" + num + ")");

                for (Integer k : Main.listaNumeritos) {
                    System.out.print(k + ", ");
                }

                miSignal.doNotify();

                try {
                    Thread.sleep(temp);
                } catch (InterruptedException e) {
                    e.printStackTrace();
                }
            } else {
                i--;
                System.out.println("\nP - Wait");
                miSignal.doWait();
            }


        }

    }
}
