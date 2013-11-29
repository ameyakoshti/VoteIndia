
import java.awt.image.BufferedImage;
import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileWriter;
import java.io.IOException;
import java.io.PrintStream;
import java.net.URL;
import java.util.ArrayList;
import java.util.List;

import javax.imageio.ImageIO;

import org.openrdf.OpenRDFException;
import org.openrdf.model.Value;
import org.openrdf.query.BindingSet;
import org.openrdf.query.QueryLanguage;
import org.openrdf.query.TupleQuery;
import org.openrdf.query.TupleQueryResult;
import org.openrdf.repository.Repository;
import org.openrdf.repository.RepositoryConnection;
import org.openrdf.repository.RepositoryException;
import org.openrdf.repository.sail.SailRepository;
import org.openrdf.sail.nativerdf.NativeStore;

import com.hp.hpl.jena.query.QueryExecution;
import com.hp.hpl.jena.query.QueryExecutionFactory;
import com.hp.hpl.jena.query.QuerySolution;
import com.hp.hpl.jena.query.ResultSet;

public class DBpediaData {
	static PrintStream w;
	static String img;

	public static List<String> getStateName() throws RepositoryException, FileNotFoundException {
		List<String> state = new ArrayList<>();

		File dataDir = new File("548-2");

		Repository Repo = new SailRepository(new NativeStore(dataDir));
		Repo.initialize();

		try {
			RepositoryConnection con = Repo.getConnection();

			try {
				String queryString = "prefix rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#> " + "prefix ex: <http://example.com/> " + "select distinct ?z where {?x ex:state ?z.} group by ?z";

				System.out.println(queryString);
				TupleQuery tupleQuery = con.prepareTupleQuery(QueryLanguage.SPARQL, queryString);
				TupleQueryResult result = tupleQuery.evaluate();

				try {
					while (result.hasNext()) {
						BindingSet bindingSet = result.next();
						Value valueOfX = bindingSet.getValue("z");
						String state_name = valueOfX.stringValue();
						state_name = state_name.replace(" ", "_");
						if (state_name.equalsIgnoreCase("Orissa"))
							state_name = "Odisha";

						if (state_name.contains("&"))
							state_name = state_name.replace("&", "and");

						state.add(state_name);
					}
				} finally {
					result.close();
				}
			} finally {
				con.close();
			}
		} catch (OpenRDFException e) {
			// handle exception
		}

		return state;

		/*
		 * //After forming list of state names w=new
		 * PrintStream("C:\\repo\\q5.csv"); w.println(
		 * "state , capital , coordinates , image , population , website , abstract"
		 * ); Iterator<String>i=state.iterator(); while(i.hasNext()){ String
		 * state_name=i.next(); //System.out.println(state_name);
		 * getStateData(state_name); }
		 * 
		 * w.close();
		 */

	}

	public static void getStateData(String state_name) {
		String service = "http://dbpedia.org/sparql";
		if (state_name.equalsIgnoreCase("Orissa"))
			state_name = "Odisha";

		if (state_name.contains("&"))
			state_name = state_name.replace("&", "and");

		System.out.println(state_name);

		//String tempname = state_name.replace("_", " ");
		String queryStartDate = "PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>" + "PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>" + "PREFIX dbpedia: <http://dbpedia.org/resource/>"
				+ "PREFIX dcterms: <http://purl.org/dc/terms/>" + "PREFIX dbpedia-owl: <http://dbpedia.org/ontology/>" + "PREFIX category: <http://dbpedia.org/resource/Category:>"
				+ "PREFIX xsd: <http://www.w3.org/2001/XMLSchema#>" + "PREFIX foaf: <http://xmlns.com/foaf/0.1/>" + "PREFIX dbpprop: <http://dbpedia.org/property/>"
				+ "PREFIX dbprop: <http://dbpedia.org/property/>" + "PREFIX grs: <http://www.georss.org/georss/> " + "SELECT DISTINCT ?state ?capital ?website ?pop ?coor ?img ?abs WHERE { "
				+ "?state dcterms:subject category:" + state_name + ". " + "?state dbprop:seat ?capital. " + "?state grs:point ?coor. " + "?state dbpedia-owl:thumbnail ?img. "
				+ "?state dbpedia-owl:abstract ?abs. " + "FILTER(lang(?abs) = 'en')" + "optional{?state dbprop:website ?website. " + "?state dbpprop:populationTotal ?pop.} "
				+ "} group by ?state limit 2";
		System.out.println(queryStartDate);

		QueryExecution qeStartDate = QueryExecutionFactory.sparqlService(service, queryStartDate);

		QuerySolution solStartDate;
		// Contains the list of CM for that "year" variable

		try {
			ResultSet resultStartDate = qeStartDate.execSelect();

			// Create hashmap for the CM and start date
			while (resultStartDate.hasNext()) {
				solStartDate = (QuerySolution) resultStartDate.next();
				w.print(solStartDate.get("?state").toString() + " , " + solStartDate.get("?capital").toString() + " , " + solStartDate.get("?coor").toString() + " , "
						+ solStartDate.get("?img").toString() + " , ");
				if (solStartDate.get("?pop") != null)
					w.print(solStartDate.get("?pop").toString() + " , ");
				else
					w.print("null , ");
				if (solStartDate.get("?website") != null)
					w.print(solStartDate.get("?website").toString() + " , ");
				else
					w.print("null , ");
				String abs = solStartDate.get("?abs").toString().replace(",", " ");
				if (solStartDate.get("?abs") != null)
					w.print(abs);
				w.println();
				img = solStartDate.get("?img").toString();
			}
			getimages(img, state_name);
		}
		// Create hashmap for the CM and end date
		finally {
			qeStartDate.close();
		}

	}

	public static void getCMDetails(String cm_name, FileWriter w) throws IOException {
		String service = "http://dbpedia.org/sparql";
		cm_name = cm_name.trim();
		cm_name = cm_name.replace(" ", "_").trim();
		System.out.println(cm_name);

		String queryStartDate;

		queryStartDate = "PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>" + "PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>" + "PREFIX dbpedia: <http://dbpedia.org/resource/>"
				+ "PREFIX dbpedia-owl: <http://dbpedia.org/ontology/>" + "PREFIX foaf: <http://xmlns.com/foaf/0.1/>PREFIX dbpprop: <http://dbpedia.org/property/>"
				+ "PREFIX dbprop: <http://dbpedia.org/property/>" + "PREFIX owl: <http://www.w3.org/2002/07/owl#> PREFIX dbpprop: <http://dbpedia.org/property/>" + " SELECT ?abs ?party ?wiki ?img"
				+ " WHERE {" + " optional{<http://dbpedia.org/resource/" + cm_name + "> dbpprop:party|dbpedia-owl:party ?party.}" + " <http://dbpedia.org/resource/" + cm_name
				+ "> foaf:isPrimaryTopicOf ?wiki." + " <http://dbpedia.org/resource/" + cm_name + "> dbpedia-owl:abstract ?abs." + " optional {<http://dbpedia.org/resource/" + cm_name
				+ "> dbpedia-owl:thumbnail ?img.}" + " FILTER(lang(?abs) = 'en')" + " } limit 1";

		System.out.println(queryStartDate);

		QueryExecution qeStartDate = QueryExecutionFactory.sparqlService(service, queryStartDate);

		QuerySolution solStartDate;
		// Contains the list of CM for that "year" variable

		try {
			ResultSet resultStartDate = qeStartDate.execSelect();

			// Create hashmap for the CM and start date
			while (resultStartDate.hasNext()) {
				solStartDate = (QuerySolution) resultStartDate.next();
				String abs = solStartDate.get("?abs").toString().replace(",", " ");
				w.append(abs);
				w.append(",");
				try {
					w.append(solStartDate.get("?party").toString());
					w.append(",");
				} catch (Exception e) {

				}
				w.append(solStartDate.get("?wiki").toString());
				w.append(",");
				try {
					w.append(solStartDate.get("?img").toString());
					w.append(",");
				} catch (Exception e) {

				}

				// img = solStartDate.get("?img").toString().replace(",", "");
				w.append("\n");
			}
			// getimages(img, cm_name);

		}
		// Create hashmap for the CM and end date
		finally {
			qeStartDate.close();
		}

	}

	public static void getimages(String imgpath, String statename) {

		BufferedImage image = null;
		try {

			URL url = new URL(imgpath);
			// read the url
			image = ImageIO.read(url);
			System.out.println(image.getHeight());

			ImageIO.write(image, "png", File.createTempFile(statename + "_img", ".png", new File("/Users/ameyakoshti/Downloads/imgs")));

			// for jpg
			ImageIO.write(image, "jpg", File.createTempFile(statename + "_img", ".png", new File("/Users/ameyakoshti/Downloads/imgs")));

		} catch (IOException e) {
			e.printStackTrace();
		}
	}
}
