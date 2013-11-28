import java.io.File;
import java.io.IOException;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.Iterator;
import java.util.List;
import java.util.Map;

import org.json.JSONException;
import org.json.JSONObject;
import org.json.XML;
import org.openrdf.OpenRDFException;
import org.openrdf.query.BindingSet;
import org.openrdf.query.QueryLanguage;
import org.openrdf.query.TupleQuery;
import org.openrdf.query.TupleQueryResult;
import org.openrdf.repository.Repository;
import org.openrdf.repository.RepositoryConnection;
import org.openrdf.repository.RepositoryException;
import org.openrdf.repository.sail.SailRepository;
import org.openrdf.rio.RDFFormat;
import org.openrdf.rio.RDFParseException;
import org.openrdf.sail.nativerdf.NativeStore;

import com.hp.hpl.jena.query.QueryExecution;
import com.hp.hpl.jena.query.QueryExecutionFactory;
import com.hp.hpl.jena.query.QuerySolution;
import com.hp.hpl.jena.query.ResultSet;

public class VoteIndia {
	private static HashMap<String, String> politicalParties;
	private static List<String> allFactors;

	public static void main(String[] args) {

		// Initial core-data
		initialize();

		// createRepository();

		File repoLocation = new File("548");
		Repository myRepository = new SailRepository(new NativeStore(
				repoLocation));
		try {
			myRepository.initialize();
		} catch (RepositoryException e) {
			e.printStackTrace();
		}

		String state = "Nagaland";

		String xmlData = getAllData(myRepository, state);

		JSONObject xmlJSONObj;
		String JSONData;

		try {
			xmlJSONObj = XML.toJSONObject(xmlData);
			JSONData = xmlJSONObj.toString();
		} catch (JSONException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			JSONData = "error";
		}

		System.out.println(JSONData);
		/*
		 * try { myRepository.shutDown(); } catch (RepositoryException e) {
		 * e.printStackTrace(); }
		 */
	}

	public static void initialize() {
		politicalParties = new HashMap<String, String>();
		politicalParties.put("bharatiya", "Bharatiya Janta Party");
		politicalParties.put("congress", "Indian National Congress");
		politicalParties.put("bahujan", "Bahujan Samaj party");
		politicalParties.put("samajwadi", "Samajwadi Party");
		politicalParties.put("samata", "Samata Party");
		politicalParties.put("communist", "Communist Party of India");
		politicalParties.put("rashtriya", "Rashtriya Janata Dal");
		politicalParties.put("shiv", "Shiv Sena");
		politicalParties.put("marxist", "Communist Party of India (Marxist)");

		allFactors = new ArrayList<String>();
		allFactors.add("Services growth");
		allFactors.add("Agriculture and Allied growth");
		allFactors.add("Female Literacy Rate");
		allFactors.add("Male Literacy Rate");
		allFactors.add("Industry growth");
		allFactors.add("Manufacturing growth");
		allFactors.add("Mining and Quarrying growth");
	}

	public static void createRepository() {
		File repoLocation = new File("548");

		File RDFFactor1 = new File("WSP1VW1.ttl");
		File RDFFactor2 = new File("WSP1VW2.ttl");
		File RDFFactor3 = new File("WSP1VW3.ttl");
		File RDFFactor4 = new File("WSP1VW4.ttl");
		File RDFFactor5 = new File("WSP1VW5.ttl");
		File RDFFactor6 = new File("WSP1VW6.ttl");
		File RDFFactor7 = new File("WSP1VW7.ttl");
		File RDFFactor8 = new File("WSP1VW8.ttl");

		String baseURI = "548";

		Repository newLocalRepository = new SailRepository(new NativeStore(
				repoLocation));

		try {
			newLocalRepository.initialize();
			RepositoryConnection con = newLocalRepository.getConnection();
			try {
				con.add(RDFFactor1, baseURI, RDFFormat.TURTLE);
				con.add(RDFFactor2, baseURI, RDFFormat.TURTLE);
				con.add(RDFFactor3, baseURI, RDFFormat.TURTLE);
				con.add(RDFFactor4, baseURI, RDFFormat.TURTLE);
				con.add(RDFFactor5, baseURI, RDFFormat.TURTLE);
				con.add(RDFFactor6, baseURI, RDFFormat.TURTLE);
				con.add(RDFFactor7, baseURI, RDFFormat.TURTLE);
				con.add(RDFFactor8, baseURI, RDFFormat.TURTLE);

			} catch (RDFParseException e) {
				e.printStackTrace();
			} catch (IOException e) {
				e.printStackTrace();
			}

			newLocalRepository.shutDown();

		} catch (RepositoryException e) {
			e.printStackTrace();
		}
	}

	public static String getAllData(Repository localRepository, String state) {

		int year;
		String value = "";
		HashMap<String, String> factorValue = new HashMap<String, String>();
		String XML = "<state name=\"" + state + "\">";

		// Make calls based on all the years

		Boolean onlyOnce = false;
		for (year = 2013; year >= 2000; year--) {
			System.out.println("Year:" + year);
			XML += "<year yearvalue=\"" + year + "\">";
			// Get the list of CMs for a particular year
			System.out.println("Getting CMs...");
			List<String> CM = getCMFromDBpedia(year, state);
			XML += "<cms>";
			for (int iterateCM = 0; iterateCM < CM.size(); iterateCM++) {
				XML += "<cm cmname=\"" + CM.get(iterateCM) + "\"/>";
			}
			XML += "</cms>";

			System.out.println("Getting Factors...");
			// Get the values of all the factors based on the year
			XML += "<factors>";
			for (int factorIndex = 0; factorIndex < allFactors.size(); factorIndex++) {
				value = localDatabase(localRepository, state, year,
						allFactors.get(factorIndex));
				factorValue.put(allFactors.get(factorIndex), value);
			}

			Iterator it = factorValue.entrySet().iterator();
			while (it.hasNext()) {
				Map.Entry pairsFactorValue = (Map.Entry) it.next();
				XML += "<factor factorname=\"" + pairsFactorValue.getKey()
						+ "\" factorvalue=\"" + pairsFactorValue.getValue()
						+ "\"/>";
			}
			XML += "</factors>";
			XML += "</year>";
		}

		XML += "</state>";
		// System.out.println(XML);
		return XML;
	}

	public static String getStateData(String state) {

		return "something";
	}

	public static String getCMNewsData(String CM) {

		return "something";
	}

	public static List<String> getCMFromDBpedia(int year, String state) {
		String service = "http://dbpedia.org/sparql";

		String queryStartDate = "PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>"
				+ "PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>"
				+ "PREFIX dbpedia: <http://dbpedia.org/resource/>"
				+ "PREFIX dcterms: <http://purl.org/dc/terms/>"
				+ "PREFIX dbpedia-owl: <http://dbpedia.org/ontology/>"
				+ "PREFIX category: <http://dbpedia.org/resource/Category:>"
				+ "PREFIX xsd: <http://www.w3.org/2001/XMLSchema#>"
				+ "SELECT DISTINCT ?URIOfCM (GROUP_CONCAT(STR(?startyear); separator = \";\") as ?startyear) WHERE {"
				+ "?URIOfCM dcterms:subject category:Chief_Ministers_of_"
				+ state
				+ "."
				+ "?URIOfCM dbpedia-owl:activeYearsStartDate ?startyear."
				+ "FILTER(xsd:date(?startyear) > \"1990-01-01\"^^xsd:date)"
				+ "} GROUP BY ?URIOfCM";

		String queryEndDate = "PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>"
				+ "PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>"
				+ "PREFIX dbpedia: <http://dbpedia.org/resource/>"
				+ "PREFIX dcterms: <http://purl.org/dc/terms/>"
				+ "PREFIX dbpedia-owl: <http://dbpedia.org/ontology/>"
				+ "PREFIX category: <http://dbpedia.org/resource/Category:>"
				+ "PREFIX xsd: <http://www.w3.org/2001/XMLSchema#>"
				+ "SELECT DISTINCT ?URIOfCM (GROUP_CONCAT(STR(?endyear); separator = \";\") as ?endyear) WHERE {"
				+ "?URIOfCM dcterms:subject category:Chief_Ministers_of_"
				+ state
				+ "."
				+ "?URIOfCM dbpedia-owl:activeYearsEndDate ?endyear."
				+ "FILTER(xsd:date(?endyear) > \"1990-01-01\"^^xsd:date)"
				+ "} GROUP BY ?URIOfCM";

		QueryExecution qeStartDate = QueryExecutionFactory.sparqlService(
				service, queryStartDate);
		QueryExecution qeEndDate = QueryExecutionFactory.sparqlService(service,
				queryEndDate);

		QuerySolution solStartDate;
		QuerySolution solEndDate;

		// Contains the list of CM for that "year" variable
		List<String> CM = new ArrayList<String>();

		HashMap<String, String> hmStartDate = new HashMap<String, String>();
		HashMap<String, String> hmEndDate = new HashMap<String, String>();

		try {
			ResultSet resultStartDate = qeStartDate.execSelect();
			ResultSet resultEndDate = qeEndDate.execSelect();

			// Create hashmap for the CM and start date
			while (resultStartDate.hasNext()) {
				solStartDate = (QuerySolution) resultStartDate.next();
				hmStartDate.put(solStartDate.get("?URIOfCM").toString(),
						solStartDate.get("?startyear").toString());
			}

			// Create hashmap for the CM and end date
			while (resultEndDate.hasNext()) {
				solEndDate = (QuerySolution) resultEndDate.next();
				hmEndDate.put(solEndDate.get("?URIOfCM").toString(), solEndDate
						.get("?endyear").toString());
			}

			Iterator it = hmStartDate.entrySet().iterator();
			while (it.hasNext()) {
				Map.Entry pairsStartYear = (Map.Entry) it.next();
				// System.out.println(pairs.getKey() + " = " +
				// pairs.getValue());

				if (hmEndDate.containsKey(pairsStartYear.getKey())) {
					String[] startDates = pairsStartYear.getValue().toString()
							.split(";");
					String[] endDates = hmEndDate.get(pairsStartYear.getKey())
							.toString().split(";");

					for (int i = 0; i < startDates.length; i++) {
						String[] startYear = startDates[i].split("-");
						String[] endYear = null;
						try {
							endYear = endDates[i].split("-");
						} catch (Exception e) {
							// corresponding end date not found
							endYear = "2013-01-01".split("-");
						}

						if (Integer.parseInt(startYear[0]) <= year
								&& year <= Integer.parseInt(endYear[0])) {
							// CM Found!!
							CM.add(pairsStartYear.getKey().toString());
						}
					}
				}

				it.remove();
			}
		} catch (Exception e) {
			e.printStackTrace();
		} finally {
			qeStartDate.close();
			qeEndDate.close();
		}
		return CM;
	}

	public static String localDatabase(Repository myRepository, String state,
			int year, String factor) {
		String factorValue = "NA";
		try {
			RepositoryConnection con = myRepository.getConnection();

			try {
				String queryString = "PREFIX ex:<http://example.com/> "
						+ "select * where{" + "?x ex:state \"" + state + "\"."
						+ "?x ex:factor \"" + factor + "\"." + "?x ex:year \""
						+ year + "\"." + "?x ex:value ?y." + "}";
				TupleQuery tupleQuery = con.prepareTupleQuery(
						QueryLanguage.SPARQL, queryString);
				TupleQueryResult result = tupleQuery.evaluate();

				try {
					List<String> bindingNames = result.getBindingNames();
					while (result.hasNext()) {
						BindingSet bindingSet = result.next();
						factorValue = bindingSet.getValue(bindingNames.get(1))
								.toString();
					}
				} finally {
					result.close();
				}
			} finally {
				con.close();
			}
		} catch (OpenRDFException e) {
			e.printStackTrace();
		}
		if (factorValue == "") {
			return "NA";
		} else {
			return factorValue.replace("\"", "");
		}
	}

}
