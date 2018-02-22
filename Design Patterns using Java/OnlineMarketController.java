// Honor Pledge:
//
// I pledge that I have neither given nor 
// received any help on this assignment.
//
// yashkuru

import java.rmi.Naming;
import java.rmi.RemoteException;
import java.rmi.server.UnicastRemoteObject;

/*
*	Controller class which acts as intermediate in between Model and View
*	Implements OnlineMarket interface and defines all the functions
*
*/
public class OnlineMarketController extends UnicastRemoteObject implements OnlineMarket{
	private String name;
	private int regId = 0;

	//constructor for controller
	public OnlineMarketController(String name) throws RemoteException {
		super(); 
		this.name = name;
	}

	//this method returns a reigstration id for a customer
	public synchronized int regId() throws RemoteException {
		regId++; 
		return regId;
	}
	
	//yet to be implemented
	//these methods may be placed either in Model or Controller based on upcoming requirements.
	public void loginToMarket() throws java.rmi.RemoteException{}
	public void addItemsToMarket() throws java.rmi.RemoteException{}
	public void removeItemsFromMarket() throws java.rmi.RemoteException{}
	public void updateItems() throws java.rmi.RemoteException{}
	public void viewMarketItems() throws java.rmi.RemoteException{}
	public void viewMarketCart() throws java.rmi.RemoteException{}
	
	public String registerCustomer() throws RemoteException{
		OnlineMarketModel modelObj= new OnlineMarketModel();
		return modelObj.registerCustomer();
		// modelObj.loginToMarket();
		// modelObj.addItemsToMarket();
		// modelObj.removeItemsFromMarket();
		// modelObj.viewMarketItems();
		// modelObj.viewMarketCart();
		
	}

	//Added main method
	public static void main(String args[]) {
		// Set the RMI Security Manager...
		System.setSecurityManager(new SecurityManager());
		//try and catch block for exception handling
		try {
			System.out.println("You are now entering Online Market Place");
			
			// Connection string to Online Market Server
			String name = "//tesla.cs.iupui.edu:5432/onlineMarketServer";
			
			// Create a new instance of a Online market server.
			OnlineMarketController marketCntrlr = new OnlineMarketController(name);
			System.out.println("Reaching server:" + name);
			
			// rebind binds the server and RMI Service
			Naming.rebind(name, marketCntrlr);
			
			System.out.println("Interface is Ready!You can register, login and shop");
		} 
		catch (Exception e){
			System.out.println("Online Market Server Exception: " + e.getMessage());
			e.printStackTrace();
		}
	}

}